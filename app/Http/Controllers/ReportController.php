<?php

namespace App\Http\Controllers;

use App\Models\StockMutation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    /**
     * Show report filter form and preview.
     */
    public function index(Request $request): View
    {
        $month = $request->get('month', now()->format('m'));
        $year = $request->get('year', now()->format('Y'));

        $mutations = StockMutation::with(['product', 'user'])
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->orderBy('created_at', 'asc')
            ->get();

        $summary = [
            'total_in' => $mutations->where('type', 'in')->sum('quantity'),
            'total_out' => $mutations->where('type', 'out')->sum('quantity'),
            'count' => $mutations->count(),
        ];

        return view('reports.index', compact('mutations', 'summary', 'month', 'year'));
    }

    /**
     * Generate and stream/download monthly stock mutations PDF report.
     */
    public function exportPdf(Request $request)
    {
        $request->validate([
            'month' => ['required', 'numeric', 'between:1,12'],
            'year' => ['required', 'numeric', 'min:2000', 'max:' . (now()->year + 5)],
        ]);

        $month = $request->get('month');
        $year = $request->get('year');

        $mutations = StockMutation::with(['product', 'user', 'product.category'])
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->orderBy('created_at', 'asc')
            ->get();

        $summary = [
            'total_in' => $mutations->where('type', 'in')->sum('quantity'),
            'total_out' => $mutations->where('type', 'out')->sum('quantity'),
            'count' => $mutations->count(),
        ];

        $monthName = \Carbon\Carbon::create(null, $month)->translatedFormat('F');

        $pdf = Pdf::loadView('reports.monthly_pdf', compact('mutations', 'summary', 'month', 'year', 'monthName'));
        
        // Return stream so it displays directly in the browser with print options
        return $pdf->stream("Laporan_Mutasi_{$year}_{$month}.pdf");
    }
}
