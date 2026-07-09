@extends('layouts.app')

@section('title', 'Tambah Produk')
@section('page_title', 'Tambah Produk Baru')

@section('content')
<div class="mb-6">
    <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-slate-200 transition-colors">
        <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Produk
    </a>
</div>

<div class="max-w-2xl glass-panel rounded-2xl p-8 shadow-xl">
    <h3 class="text-md font-bold text-white mb-6 pb-3 border-b border-slate-800/80">
        <i class="fa-solid fa-circle-info text-brand-500 mr-2"></i> Formulir Spesifikasi Produk
    </h3>

    <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- SKU -->
            <div>
                <label for="sku" class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Kode SKU <span class="text-rose-500">*</span></label>
                <input type="text" name="sku" id="sku" value="{{ old('sku') }}" required placeholder="Contoh: ELK-LAP-001"
                    class="block w-full px-4 py-2.5 bg-slate-950 border border-slate-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 rounded-xl text-sm text-slate-200 placeholder-slate-600 focus:outline-none transition-all duration-200">
                @error('sku')
                    <span class="text-rose-500 text-xs mt-1.5 block font-medium">{{ $message }}</span>
                @enderror
            </div>

            <!-- Nama Barang -->
            <div>
                <label for="name" class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Nama Produk <span class="text-rose-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="Contoh: Laptop Asus Vivobook"
                    class="block w-full px-4 py-2.5 bg-slate-950 border border-slate-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 rounded-xl text-sm text-slate-200 placeholder-slate-600 focus:outline-none transition-all duration-200">
                @error('name')
                    <span class="text-rose-500 text-xs mt-1.5 block font-medium">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Kategori -->
            <div>
                <label for="category_id" class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Kategori <span class="text-rose-500">*</span></label>
                <select name="category_id" id="category_id" required
                    class="block w-full px-4 py-2.5 bg-slate-950 border border-slate-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 rounded-xl text-sm text-slate-200 focus:outline-none transition-all duration-200">
                    <option value="" disabled selected class="text-slate-600">Pilih Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-rose-500 text-xs mt-1.5 block font-medium">{{ $message }}</span>
                @enderror
            </div>

            <!-- Supplier -->
            <div>
                <label for="supplier_id" class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Supplier <span class="text-rose-500">*</span></label>
                <select name="supplier_id" id="supplier_id" required
                    class="block w-full px-4 py-2.5 bg-slate-950 border border-slate-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 rounded-xl text-sm text-slate-200 focus:outline-none transition-all duration-200">
                    <option value="" disabled selected class="text-slate-600">Pilih Supplier</option>
                    @foreach($suppliers as $sup)
                        <option value="{{ $sup->id }}" {{ old('supplier_id') == $sup->id ? 'selected' : '' }}>{{ $sup->name }}</option>
                    @endforeach
                </select>
                @error('supplier_id')
                    <span class="text-rose-500 text-xs mt-1.5 block font-medium">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Harga -->
            <div>
                <label for="price" class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Harga Beli (Rp) <span class="text-rose-500">*</span></label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" required min="0" placeholder="0"
                    class="block w-full px-4 py-2.5 bg-slate-950 border border-slate-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 rounded-xl text-sm text-slate-200 placeholder-slate-600 focus:outline-none transition-all duration-200">
                @error('price')
                    <span class="text-rose-500 text-xs mt-1.5 block font-medium">{{ $message }}</span>
                @enderror
            </div>

            <!-- Stok Awal -->
            <div>
                <label for="stock" class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Stok Awal</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" min="0" placeholder="0"
                    class="block w-full px-4 py-2.5 bg-slate-950 border border-slate-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 rounded-xl text-sm text-slate-200 placeholder-slate-600 focus:outline-none transition-all duration-200">
                <span class="text-slate-500 text-2xs mt-1 block">Akan tercatat sebagai stok pembuka</span>
                @error('stock')
                    <span class="text-rose-500 text-xs mt-1.5 block font-medium">{{ $message }}</span>
                @enderror
            </div>

            <!-- Batas Minimum -->
            <div>
                <label for="minimum_stock" class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Batas Minimum <span class="text-rose-500">*</span></label>
                <input type="number" name="minimum_stock" id="minimum_stock" value="{{ old('minimum_stock', 10) }}" required min="0" placeholder="10"
                    class="block w-full px-4 py-2.5 bg-slate-950 border border-slate-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 rounded-xl text-sm text-slate-200 placeholder-slate-600 focus:outline-none transition-all duration-200">
                <span class="text-slate-500 text-2xs mt-1 block">Batas alert stok kritis</span>
                @error('minimum_stock')
                    <span class="text-rose-500 text-xs mt-1.5 block font-medium">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Form Buttons -->
        <div class="pt-4 border-t border-slate-800/80 flex items-center justify-end gap-3">
            <a href="{{ route('products.index') }}" class="py-2.5 px-5 bg-slate-900 border border-slate-800 hover:bg-slate-800/80 text-xs font-semibold rounded-xl text-slate-300 hover:text-white transition-all">
                Batal
            </a>
            <button type="submit" class="py-2.5 px-6 bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-600 text-xs font-semibold rounded-xl text-white shadow-md shadow-brand-500/10 hover:shadow-brand-500/20 transition-all">
                Simpan Produk
            </button>
        </div>
    </form>
</div>
@endsection
