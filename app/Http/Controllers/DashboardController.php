<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMutation;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(): View
    {
        $user = Auth::user();

        // 1. If Supplier role, render dashboard tailored to their products
        if ($user->hasRole('Supplier')) {
            $supplierId = $user->supplier_id;

            $totalProducts = Product::where('supplier_id', $supplierId)->count();
            $lowStockProducts = Product::where('supplier_id', $supplierId)
                ->lowStock()
                ->with(['category'])
                ->get();

            $recentMutations = StockMutation::whereHas('product', function ($query) use ($supplierId) {
                $query->where('supplier_id', $supplierId);
            })
            ->with(['product', 'user'])
            ->latest()
            ->take(5)
            ->get();

            // Formulate chart data (Last 7 days of mutations for their products)
            $chartData = [];
            for ($i = 6; $i >= 0; $i--) {
                $date = now()->subDays($i)->format('Y-m-d');
                $formattedDate = now()->subDays($i)->format('d M');

                $inCount = StockMutation::where('type', 'in')
                    ->whereDate('created_at', $date)
                    ->whereHas('product', function ($query) use ($supplierId) {
                        $query->where('supplier_id', $supplierId);
                    })
                    ->sum('quantity');

                $outCount = StockMutation::where('type', 'out')
                    ->whereDate('created_at', $date)
                    ->whereHas('product', function ($query) use ($supplierId) {
                        $query->where('supplier_id', $supplierId);
                    })
                    ->sum('quantity');

                $chartData[] = [
                    'date' => $formattedDate,
                    'in' => $inCount,
                    'out' => $outCount,
                ];
            }

            return view('dashboard', compact('totalProducts', 'lowStockProducts', 'recentMutations', 'chartData'));
        }

        // 2. Super Admin or Staff Gudang dashboards
        $totalProducts = Product::count();
        $totalSuppliers = Supplier::count();
        $totalValue = Product::selectRaw('SUM(stock * price) as value')->first()->value ?? 0;
        
        $lowStockProducts = Product::lowStock()->with(['category', 'supplier'])->get();
        
        $recentMutations = StockMutation::with(['product', 'user'])
            ->latest()
            ->take(5)
            ->get();

        // Formulate chart data (Last 7 days of all mutations)
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $formattedDate = now()->subDays($i)->format('d M');

            $inCount = StockMutation::where('type', 'in')
                ->whereDate('created_at', $date)
                ->sum('quantity');

            $outCount = StockMutation::where('type', 'out')
                ->whereDate('created_at', $date)
                ->sum('quantity');

            $chartData[] = [
                'date' => $formattedDate,
                'in' => $inCount,
                'out' => $outCount,
            ];
        }

        return view('dashboard', compact(
            'totalProducts',
            'totalSuppliers',
            'totalValue',
            'lowStockProducts',
            'recentMutations',
            'chartData'
        ));
    }
}
