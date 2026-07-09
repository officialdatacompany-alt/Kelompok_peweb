@extends('layouts.app')

@section('title', 'Laporan Mutasi')
@section('page_title', 'Laporan Mutasi Barang Bulanan')

@section('content')
<div class="mb-6">
    <p class="text-sm text-slate-400">Pilih rentang bulan dan tahun untuk menghasilkan laporan arus barang masuk dan keluar.</p>
</div>

<!-- FILTER PANEL -->
<div class="glass-panel p-6 rounded-2xl mb-8 shadow-md">
    <form action="{{ route('reports.index') }}" method="GET" class="flex flex-col md:flex-row items-end gap-6">
        <!-- Month -->
        <div class="w-full md:w-1/3">
            <label for="month" class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Bulan</label>
            <select name="month" id="month" class="block w-full px-4 py-2.5 bg-slate-950 border border-slate-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 rounded-xl text-sm text-slate-200 focus:outline-none transition-all duration-200">
                @for ($m = 1; $m <= 12; $m++)
                    <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}" {{ $month == str_pad($m, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                        {{ \Carbon\Carbon::create(null, $m)->translatedFormat('F') }}
                    </option>
                @endfor
            </select>
        </div>

        <!-- Year -->
        <div class="w-full md:w-1/3">
            <label for="year" class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Tahun</label>
            <select name="year" id="year" class="block w-full px-4 py-2.5 bg-slate-950 border border-slate-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 rounded-xl text-sm text-slate-200 focus:outline-none transition-all duration-200">
                @for ($y = now()->year - 2; $y <= now()->year + 3; $y++)
                    <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
            </select>
        </div>

        <!-- Filter & Print Actions -->
        <div class="w-full md:w-1/3 flex gap-3">
            <button type="submit" class="flex-1 py-2.5 px-4 bg-slate-900 border border-slate-800 hover:bg-slate-800/80 text-xs font-semibold rounded-xl text-center text-slate-200 hover:text-white transition-all duration-200">
                <i class="fa-solid fa-filter mr-1.5 text-brand-500"></i> Filter Preview
            </button>
            
            <a href="{{ route('reports.pdf', ['month' => $month, 'year' => $year]) }}" target="_blank"
                class="flex-1 py-2.5 px-4 bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-600 text-xs font-semibold rounded-xl text-center text-white shadow-md shadow-brand-500/10 hover:shadow-brand-500/20 transition-all duration-200">
                <i class="fa-solid fa-file-pdf mr-1.5"></i> Cetak PDF
            </a>
        </div>
    </form>
</div>

<!-- MONTHLY SUMMARY STATS -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="glass-card p-5 rounded-2xl border border-slate-800/60 flex items-center gap-4">
        <div class="h-10 w-10 rounded-lg bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400">
            <i class="fa-solid fa-circle-down"></i>
        </div>
        <div>
            <span class="text-3xs text-slate-500 uppercase tracking-widest font-semibold block">Total Qty Masuk</span>
            <h4 class="text-xl font-bold text-slate-100 mt-0.5">{{ number_format($summary['total_in']) }} unit</h4>
        </div>
    </div>

    <div class="glass-card p-5 rounded-2xl border border-slate-800/60 flex items-center gap-4">
        <div class="h-10 w-10 rounded-lg bg-rose-500/10 border border-rose-500/20 flex items-center justify-center text-rose-400">
            <i class="fa-solid fa-circle-up"></i>
        </div>
        <div>
            <span class="text-3xs text-slate-500 uppercase tracking-widest font-semibold block">Total Qty Keluar</span>
            <h4 class="text-xl font-bold text-slate-100 mt-0.5">{{ number_format($summary['total_out']) }} unit</h4>
        </div>
    </div>

    <div class="glass-card p-5 rounded-2xl border border-slate-800/60 flex items-center gap-4">
        <div class="h-10 w-10 rounded-lg bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400">
            <i class="fa-solid fa-receipt"></i>
        </div>
        <div>
            <span class="text-3xs text-slate-500 uppercase tracking-widest font-semibold block">Frekuensi Mutasi</span>
            <h4 class="text-xl font-bold text-slate-100 mt-0.5">{{ number_format($summary['count']) }} kali transaksi</h4>
        </div>
    </div>
</div>

<!-- PREVIEW TABLE -->
<div class="glass-panel rounded-2xl overflow-hidden shadow-xl">
    <div class="px-6 py-4 border-b border-slate-800/80 bg-slate-900/10 flex justify-between items-center">
        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400">Preview Data Laporan</h4>
        <span class="text-xs text-slate-500">Bulan: {{ \Carbon\Carbon::create(null, $month)->translatedFormat('F') }} {{ $year }}</span>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-800 bg-slate-900/40 text-xs font-semibold text-slate-400 uppercase tracking-wider">
                    <th class="px-6 py-4">Waktu</th>
                    <th class="px-6 py-4">Nama Produk</th>
                    <th class="px-6 py-4">SKU</th>
                    <th class="px-6 py-4 text-center">Tipe</th>
                    <th class="px-6 py-4 text-center">Jumlah (Qty)</th>
                    <th class="px-6 py-4">Petugas</th>
                    <th class="px-6 py-4">Catatan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800/60 text-sm text-slate-300">
                @forelse($mutations as $mut)
                    <tr class="hover:bg-slate-900/10 transition-colors">
                        <td class="px-6 py-4 text-slate-400 font-mono text-xs">
                            {{ $mut->created_at->format('d-m-Y H:i') }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-white">
                            {{ $mut->product->name }}
                        </td>
                        <td class="px-6 py-4 font-mono text-slate-400 text-xs">
                            {{ $mut->product->sku }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($mut->type === 'in')
                                <span class="inline-flex items-center rounded-md bg-blue-500/10 px-2 py-0.5 text-xs font-bold text-blue-400 ring-1 ring-inset ring-blue-500/20">
                                    Masuk
                                </span>
                            @else
                                <span class="inline-flex items-center rounded-md bg-rose-500/10 px-2 py-0.5 text-xs font-bold text-rose-400 ring-1 ring-inset ring-rose-500/20">
                                    Keluar
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center font-bold text-white">
                            {{ number_format($mut->quantity) }}
                        </td>
                        <td class="px-6 py-4 text-slate-300 font-medium">
                            {{ $mut->user->name }}
                        </td>
                        <td class="px-6 py-4 text-slate-400 text-xs max-w-xs truncate" title="{{ $mut->notes }}">
                            {{ $mut->notes ?? '-' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fa-solid fa-folder-open text-3xl text-slate-700 mb-3"></i>
                                <h4 class="text-sm font-semibold text-slate-400">Tidak Ada Aktivitas Mutasi</h4>
                                <p class="text-xs text-slate-500 mt-1">Tidak ada transaksi barang masuk/keluar pada bulan dan tahun terpilih.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
