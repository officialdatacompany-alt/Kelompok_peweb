@extends('layouts.app')

@section('title', 'Riwayat Mutasi')
@section('page_title', 'Riwayat Mutasi Stok')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <p class="text-sm text-slate-400">Daftar rekaman kronologis barang masuk dan barang keluar di gudang.</p>
    </div>
    @if(Auth::user()->hasRole('Staff Gudang'))
        <a href="{{ route('mutations.create') }}" class="py-2.5 px-4 bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-600 text-xs font-semibold rounded-xl text-white shadow-md shadow-brand-500/10 hover:shadow-brand-500/20 transition-all duration-200">
            <i class="fa-solid fa-plus mr-1.5"></i> Catat Transaksi Baru
        </a>
    @endif
</div>

<!-- MUTATIONS TABLE -->
<div class="glass-panel rounded-2xl overflow-hidden shadow-xl">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-800 bg-slate-900/40 text-xs font-semibold text-slate-400 uppercase tracking-wider">
                    <th class="px-6 py-4">Waktu Transaksi</th>
                    <th class="px-6 py-4">Nama Produk</th>
                    <th class="px-6 py-4">SKU / Kode</th>
                    <th class="px-6 py-4 text-center">Tipe Mutasi</th>
                    <th class="px-6 py-4 text-center">Jumlah (Qty)</th>
                    <th class="px-6 py-4">Operator (Staff)</th>
                    <th class="px-6 py-4">Catatan / Keterangan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800/60 text-sm text-slate-300">
                @forelse($mutations as $mut)
                    <tr class="hover:bg-slate-900/20 transition-colors">
                        <td class="px-6 py-4 text-slate-400 font-medium">
                            {{ $mut->created_at->translatedFormat('d M Y, H:i') }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-white">
                            {{ $mut->product->name }}
                        </td>
                        <td class="px-6 py-4 font-mono text-slate-400 text-xs">
                            {{ $mut->product->sku }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($mut->type === 'in')
                                <span class="inline-flex items-center gap-1 rounded-md bg-blue-500/10 px-2.5 py-0.5 text-xs font-bold text-blue-400 ring-1 ring-inset ring-blue-500/20">
                                    <i class="fa-solid fa-arrow-down text-3xs"></i> Barang Masuk
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 rounded-md bg-rose-500/10 px-2.5 py-0.5 text-xs font-bold text-rose-400 ring-1 ring-inset ring-rose-500/20">
                                    <i class="fa-solid fa-arrow-up text-3xs"></i> Barang Keluar
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center font-bold text-white">
                            {{ number_format($mut->quantity) }}
                        </td>
                        <td class="px-6 py-4 text-slate-300 font-medium">
                            {{ $mut->user->name }}
                        </td>
                        <td class="px-6 py-4 text-slate-400 max-w-xs truncate" title="{{ $mut->notes }}">
                            {{ $mut->notes ?? '-' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fa-solid fa-clock-rotate-left text-4xl text-slate-700 mb-3"></i>
                                <h4 class="text-sm font-semibold text-slate-400">Belum Ada Riwayat Mutasi</h4>
                                <p class="text-xs text-slate-500 mt-1">Transaksi stok barang masuk atau keluar belum pernah dicatat.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINATION FOOTER -->
    @if($mutations->hasPages())
        <div class="px-6 py-4 border-t border-slate-800 bg-slate-900/20 flex items-center justify-between">
            <div class="text-xs text-slate-500">
                Menampilkan {{ $mutations->firstItem() }} - {{ $mutations->lastItem() }} dari {{ $mutations->total() }} mutasi
            </div>
            <div>
                {{ $mutations->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
