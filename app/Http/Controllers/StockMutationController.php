<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStockMutationRequest;
use App\Models\Product;
use App\Models\StockMutation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class StockMutationController extends Controller
{
    /**
     * Display a listing of the stock mutations.
     */
    public function index(): View
    {
        $mutations = StockMutation::with(['product', 'user'])
            ->latest()
            ->paginate(10);

        return view('mutations.index', compact('mutations'));
    }

    /**
     * Show the form for creating a new stock mutation.
     */
    public function create(): View
    {
        $products = Product::all();
        return view('mutations.create', compact('products'));
    }

    /**
     * Store a newly created stock mutation in storage.
     * Uses database transactions to ensure consistency.
     */
    public function store(StoreStockMutationRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $productId = $validated['product_id'];
        $quantity = $validated['quantity'];
        $type = $validated['type'];

        try {
            DB::transaction(function () use ($productId, $quantity, $type, $validated) {
                // Fetch product with lock for update to prevent concurrent stock inconsistencies
                $product = Product::lockForUpdate()->findOrFail($productId);

                if ($type === 'out') {
                    if ($product->stock < $quantity) {
                        throw ValidationException::withMessages([
                            'quantity' => "Stok tidak mencukupi. Stok saat ini: {$product->stock}.",
                        ]);
                    }
                    $product->decrement('stock', $quantity);
                } else {
                    $product->increment('stock', $quantity);
                }

                // Create the stock mutation record
                StockMutation::create([
                    'product_id' => $product->id,
                    'user_id' => Auth::id(),
                    'type' => $type,
                    'quantity' => $quantity,
                    'notes' => $validated['notes'] ?? null,
                ]);
            });

            $typeName = $type === 'in' ? 'Barang Masuk (Inbound)' : 'Barang Keluar (Outbound)';
            return redirect()->route('mutations.index')
                ->with('success', "Transaksi {$typeName} berhasil dicatat.");

        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Terjadi kesalahan sistem saat menyimpan mutasi: ' . $e->getMessage());
        }
    }
}
