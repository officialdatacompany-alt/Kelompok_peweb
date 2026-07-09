@extends('layouts.app')

@section('title', 'Data Barang')
@section('page_title', 'Manajemen Data Barang')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <p class="text-sm text-slate-400">Kelola informasi produk, SKU, kategori, dan batas minimum stok gudang.</p>
    </div>
    @if(Auth::user()->hasRole('Staff Gudang'))
        <a href="{{ route('products.create') }}" class="py-2.5 px-4 bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-600 text-xs font-semibold rounded-xl text-white shadow-md shadow-brand-500/10 hover:shadow-brand-500/20 transition-all duration-200">
            <i class="fa-solid fa-plus mr-1.5"></i> Tambah Produk Baru
        </a>
    @endif
</div>

<!-- PRODUCTS TABLE -->
<div class="glass-panel rounded-2xl overflow-hidden shadow-xl">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-800 bg-slate-900/40 text-xs font-semibold text-slate-400 uppercase tracking-wider">
                    <th class="px-6 py-4">SKU / Kode</th>
                    <th class="px-6 py-4">Nama Produk</th>
                    <th class="px-6 py-4">Kategori</th>
                    <th class="px-6 py-4">Supplier</th>
                    <th class="px-6 py-4 text-right">Harga</th>
                    <th class="px-6 py-4 text-center">Stok Saat Ini</th>
                    <th class="px-6 py-4 text-center">Batas Minimum</th>
                    @if(Auth::user()->hasRole('Staff Gudang'))
                        <th class="px-6 py-4 text-center">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800/60 text-sm text-slate-300">
                @forelse($products as $prod)
                    <tr class="hover:bg-slate-900/20 transition-colors">
                        <td class="px-6 py-4 font-mono font-semibold text-slate-200 text-xs select-all">
                            {{ $prod->sku }}
                        </td>
                        <td class="px-6 py-4 font-medium text-white">
                            {{ $prod->name }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center rounded-md bg-slate-800 px-2 py-0.5 text-xs text-slate-300 border border-slate-700/50">
                                {{ $prod->category->name }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">
                            {{ $prod->supplier->name }}
                        </td>
                        <td class="px-6 py-4 text-right font-semibold text-slate-200">
                            Rp {{ number_format($prod->price, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($prod->isLowStock())
                                <span class="inline-flex items-center gap-1 rounded-full bg-rose-500/10 px-2.5 py-0.5 text-xs font-bold text-rose-400 ring-1 ring-inset ring-rose-500/20">
                                    <span class="h-1.5 w-1.5 rounded-full bg-rose-500 animate-ping"></span>
                                    {{ $prod->stock }} (Kritis)
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 rounded-full bg-emerald-500/10 px-2.5 py-0.5 text-xs font-semibold text-emerald-400 ring-1 ring-inset ring-emerald-500/20">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                    {{ $prod->stock }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center font-medium text-slate-500">
                            {{ $prod->minimum_stock }}
                        </td>
                        @if(Auth::user()->hasRole('Staff Gudang'))
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('products.edit', $prod->id) }}" class="p-1.5 rounded-lg bg-slate-900 border border-slate-800 text-slate-400 hover:text-brand-400 hover:border-brand-500/30 transition-all">
                                        <i class="fa-solid fa-pen-to-square text-xs"></i>
                                    </a>
                                    
                                    <form action="{{ route('products.destroy', $prod->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini? Semua riwayat mutasi terkait produk ini juga akan terhapus.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg bg-slate-900 border border-slate-800 text-slate-400 hover:text-rose-400 hover:border-rose-500/30 transition-all">
                                            <i class="fa-solid fa-trash-can text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ Auth::user()->hasRole('Staff Gudang') ? 8 : 7 }}" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fa-solid fa-box-open text-4xl text-slate-700 mb-3"></i>
                                <h4 class="text-sm font-semibold text-slate-400">Belum Ada Data Produk</h4>
                                <p class="text-xs text-slate-500 mt-1">Silakan tambahkan data produk baru terlebih dahulu.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINATION FOOTER -->
    @if($products->hasPages())
        <div class="px-6 py-4 border-t border-slate-800 bg-slate-900/20 flex items-center justify-between">
            <div class="text-xs text-slate-500">
                Menampilkan {{ $products->firstItem() }} - {{ $products->lastItem() }} dari {{ $products->total() }} produk
            </div>
            <div>
                {{ $products->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
