@extends('layouts.app')

@section('title', 'Transaksi Stok')
@section('page_title', 'Catat Transaksi Barang Masuk/Keluar')

@section('content')
<div class="mb-6">
    <a href="{{ route('mutations.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-slate-200 transition-colors">
        <i class="fa-solid fa-arrow-left"></i> Kembali ke Riwayat Mutasi
    </a>
</div>

<div class="max-w-2xl grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Left Form Panel (2/3 cols) -->
    <div class="glass-panel rounded-2xl p-8 shadow-xl md:col-span-2">
        <h3 class="text-md font-bold text-white mb-6 pb-3 border-b border-slate-800/80">
            <i class="fa-solid fa-right-left text-brand-500 mr-2"></i> Formulir Transaksi Gudang
        </h3>

        <form action="{{ route('mutations.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Product Selection -->
            <div>
                <label for="product_id" class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Pilih Barang <span class="text-rose-500">*</span></label>
                <select name="product_id" id="product_id" required onchange="updateProductStockInfo()"
                    class="block w-full px-4 py-2.5 bg-slate-950 border border-slate-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 rounded-xl text-sm text-slate-200 focus:outline-none transition-all duration-200">
                    <option value="" disabled selected class="text-slate-600">-- Pilih Produk Gudang --</option>
                    @foreach($products as $prod)
                        <option value="{{ $prod->id }}" data-stock="{{ $prod->stock }}" data-min-stock="{{ $prod->minimum_stock }}" data-sku="{{ $prod->sku }}">
                            {{ $prod->name }} (SKU: {{ $prod->sku }})
                        </option>
                    @endforeach
                </select>
                @error('product_id')
                    <span class="text-rose-500 text-xs mt-1.5 block font-medium">{{ $message }}</span>
                @enderror
            </div>

            <!-- Mutation Type (Visual radio button selection) -->
            <div>
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Tipe Transaksi <span class="text-rose-500">*</span></label>
                <div class="grid grid-cols-2 gap-4">
                    <label class="relative flex items-center justify-center p-4 rounded-xl border border-slate-800 bg-slate-950/50 hover:bg-slate-900/30 cursor-pointer transition-all duration-200 select-none group" id="label-type-in">
                        <input type="radio" name="type" id="type-in" value="in" required onchange="handleTypeChange()" {{ old('type', 'in') == 'in' ? 'checked' : '' }} class="sr-only">
                        <div class="flex flex-col items-center gap-1.5">
                            <i class="fa-solid fa-circle-down text-lg text-blue-500 transition-transform group-hover:scale-110"></i>
                            <span class="text-xs font-bold text-slate-300">Barang Masuk</span>
                            <span class="text-3xs text-slate-500">(Inbound)</span>
                        </div>
                    </label>

                    <label class="relative flex items-center justify-center p-4 rounded-xl border border-slate-800 bg-slate-950/50 hover:bg-slate-900/30 cursor-pointer transition-all duration-200 select-none group" id="label-type-out">
                        <input type="radio" name="type" id="type-out" value="out" required onchange="handleTypeChange()" {{ old('type') == 'out' ? 'checked' : '' }} class="sr-only">
                        <div class="flex flex-col items-center gap-1.5">
                            <i class="fa-solid fa-circle-up text-lg text-rose-500 transition-transform group-hover:scale-110"></i>
                            <span class="text-xs font-bold text-slate-300">Barang Keluar</span>
                            <span class="text-3xs text-slate-500">(Outbound)</span>
                        </div>
                    </label>
                </div>
                @error('type')
                    <span class="text-rose-500 text-xs mt-1.5 block font-medium">{{ $message }}</span>
                @enderror
            </div>

            <!-- Quantity -->
            <div>
                <label for="quantity" class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Jumlah (Quantity) <span class="text-rose-500">*</span></label>
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity', 1) }}" required min="1" placeholder="Jumlah unit..."
                    class="block w-full px-4 py-2.5 bg-slate-950 border border-slate-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 rounded-xl text-sm text-slate-200 placeholder-slate-600 focus:outline-none transition-all duration-200">
                @error('quantity')
                    <span class="text-rose-500 text-xs mt-1.5 block font-medium">{{ $message }}</span>
                @enderror
            </div>

            <!-- Notes -->
            <div>
                <label for="notes" class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Catatan / Keterangan</label>
                <textarea name="notes" id="notes" rows="3" placeholder="Contoh: Penerimaan stok dari supplier PT. X atau Pengeluaran untuk keperluan Y..."
                    class="block w-full px-4 py-2.5 bg-slate-950 border border-slate-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 rounded-xl text-sm text-slate-200 placeholder-slate-600 focus:outline-none transition-all duration-200 resize-none">{{ old('notes') }}</textarea>
                @error('notes')
                    <span class="text-rose-500 text-xs mt-1.5 block font-medium">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit buttons -->
            <div class="pt-4 border-t border-slate-800/80 flex items-center justify-end gap-3">
                <a href="{{ route('mutations.index') }}" class="py-2.5 px-5 bg-slate-900 border border-slate-800 hover:bg-slate-800/80 text-xs font-semibold rounded-xl text-slate-300 hover:text-white transition-all">
                    Batal
                </a>
                <button type="submit" class="py-2.5 px-6 bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-600 text-xs font-semibold rounded-xl text-white shadow-md shadow-brand-500/10 hover:shadow-brand-500/20 transition-all">
                    Simpan Transaksi
                </button>
            </div>
        </form>
    </div>

    <!-- Right Summary Info Panel (1/3 cols) -->
    <div class="glass-panel rounded-2xl p-6 shadow-xl h-fit border border-slate-800/80 flex flex-col gap-5">
        <h4 class="text-sm font-bold text-white"><i class="fa-solid fa-magnifying-glass-chart text-brand-500 mr-1.5"></i> Info Stok Realtime</h4>
        
        <div id="no-product-selected" class="py-12 text-center">
            <i class="fa-solid fa-box text-3xl text-slate-700 mb-2 block"></i>
            <span class="text-xs text-slate-500">Pilih produk di sebelah kiri untuk melihat status stok realtime</span>
        </div>

        <div id="product-selected-info" class="hidden space-y-4">
            <div class="pb-3 border-b border-slate-800/50">
                <span class="text-3xs text-slate-500 uppercase tracking-widest font-semibold block">Kode SKU</span>
                <span id="info-sku" class="text-xs font-mono font-bold text-slate-300">N/A</span>
            </div>

            <div class="pb-3 border-b border-slate-800/50 flex justify-between items-center">
                <div>
                    <span class="text-3xs text-slate-500 uppercase tracking-widest font-semibold block">Stok Saat Ini</span>
                    <span id="info-stock-badge" class="text-lg font-bold text-white">0</span>
                </div>
                <div class="text-right">
                    <span class="text-3xs text-slate-500 uppercase tracking-widest font-semibold block">Batas Minimum</span>
                    <span id="info-min-stock" class="text-sm font-semibold text-slate-400">0</span>
                </div>
            </div>

            <div class="p-3 bg-slate-950 border border-slate-800 rounded-xl">
                <span class="text-3xs text-slate-500 uppercase tracking-widest font-semibold block mb-1">Status Keamanan</span>
                <div class="flex items-center gap-1.5">
                    <span id="info-status-color" class="h-2 w-2 rounded-full bg-emerald-500"></span>
                    <span id="info-status-text" class="text-xs font-bold text-slate-300">Aman</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function updateProductStockInfo() {
        const select = document.getElementById('product_id');
        const selectedOption = select.options[select.selectedIndex];
        
        const noProductSelected = document.getElementById('no-product-selected');
        const productSelectedInfo = document.getElementById('product-selected-info');
        
        if (!selectedOption.value) {
            noProductSelected.classList.remove('hidden');
            productSelectedInfo.classList.add('hidden');
            return;
        }

        noProductSelected.classList.add('hidden');
        productSelectedInfo.classList.remove('hidden');
        
        const stock = parseInt(selectedOption.getAttribute('data-stock'));
        const minStock = parseInt(selectedOption.getAttribute('data-min-stock'));
        const sku = selectedOption.getAttribute('data-sku');
        
        document.getElementById('info-sku').innerText = sku;
        document.getElementById('info-stock-badge').innerText = stock + " unit";
        document.getElementById('info-min-stock').innerText = minStock + " unit";
        
        const statusColor = document.getElementById('info-status-color');
        const statusText = document.getElementById('info-status-text');
        
        if (stock < minStock) {
            statusColor.className = "h-2 w-2 rounded-full bg-rose-500 animate-pulse";
            statusText.innerText = "Kritis (Di bawah batas minimum)";
            statusText.className = "text-xs font-bold text-rose-400";
        } else {
            statusColor.className = "h-2 w-2 rounded-full bg-emerald-500";
            statusText.innerText = "Aman (Stok mencukupi)";
            statusText.className = "text-xs font-bold text-emerald-400";
        }
    }

    function handleTypeChange() {
        const typeIn = document.getElementById('type-in');
        const typeOut = document.getElementById('type-out');
        
        const labelIn = document.getElementById('label-type-in');
        const labelOut = document.getElementById('label-type-out');
        
        if (typeIn.checked) {
            labelIn.className = "relative flex items-center justify-center p-4 rounded-xl border border-blue-500/30 bg-blue-500/5 hover:bg-blue-500/10 cursor-pointer transition-all duration-200 select-none group";
            labelOut.className = "relative flex items-center justify-center p-4 rounded-xl border border-slate-800 bg-slate-950/50 hover:bg-slate-900/30 cursor-pointer transition-all duration-200 select-none group";
        } else if (typeOut.checked) {
            labelIn.className = "relative flex items-center justify-center p-4 rounded-xl border border-slate-800 bg-slate-950/50 hover:bg-slate-900/30 cursor-pointer transition-all duration-200 select-none group";
            labelOut.className = "relative flex items-center justify-center p-4 rounded-xl border border-rose-500/30 bg-rose-500/5 hover:bg-rose-500/10 cursor-pointer transition-all duration-200 select-none group";
        }
    }

    // Init visual state on load
    document.addEventListener("DOMContentLoaded", function() {
        handleTypeChange();
        updateProductStockInfo();
    });
</script>
@endsection
