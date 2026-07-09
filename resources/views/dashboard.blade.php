@extends('layouts.app')

@section('title', 'Dashboard Utama')
@section('page_title', 'Dashboard Utama')

@section('content')
<!-- Welcome & Alerts Section -->
<div class="mb-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h3 class="text-2xl font-bold text-white">Halo, {{ Auth::user()->name }}!</h3>
            <p class="text-sm text-slate-400">Berikut adalah rangkuman aktivitas inventaris gudang hari ini.</p>
        </div>
        <div class="text-xs text-slate-400 glass-card px-4 py-2 rounded-xl flex items-center gap-2">
            <i class="fa-regular fa-calendar-days text-brand-500"></i>
            <span>{{ now()->translatedFormat('l, d F Y') }}</span>
        </div>
    </div>
</div>

<!-- STATS CARDS -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Card 1: Total Products -->
    <div class="glass-panel p-6 rounded-2xl relative overflow-hidden transition-all duration-300 hover:translate-y-[-2px] hover:border-slate-700/50">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Produk</p>
                <h3 class="text-3xl font-bold text-white mt-2">{{ $totalProducts }}</h3>
                <span class="text-xs text-slate-500 mt-1 block">Tercatat di sistem</span>
            </div>
            <div class="h-12 w-12 rounded-xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400">
                <i class="fa-solid fa-box text-xl"></i>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-cyan-400"></div>
    </div>

    <!-- Card 2: Depends on Role -->
    @if(Auth::user()->hasRole('Supplier'))
        <!-- Card 2 for Supplier: Low Stock Items -->
        <div class="glass-panel p-6 rounded-2xl relative overflow-hidden transition-all duration-300 hover:translate-y-[-2px] hover:border-slate-700/50">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Stok Menipis</p>
                    <h3 class="text-3xl font-bold mt-2 {{ $lowStockProducts->count() > 0 ? 'text-amber-400' : 'text-slate-300' }}">
                        {{ $lowStockProducts->count() }}
                    </h3>
                    <span class="text-xs text-slate-500 mt-1 block">Perlu diisi ulang segera</span>
                </div>
                <div class="h-12 w-12 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400">
                    <i class="fa-solid fa-triangle-exclamation text-xl"></i>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-500 to-yellow-400"></div>
        </div>
    @else
        <!-- Card 2 for Admin/Staff: Total Suppliers -->
        <div class="glass-panel p-6 rounded-2xl relative overflow-hidden transition-all duration-300 hover:translate-y-[-2px] hover:border-slate-700/50">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Supplier</p>
                    <h3 class="text-3xl font-bold text-white mt-2">{{ $totalSuppliers }}</h3>
                    <span class="text-xs text-slate-500 mt-1 block">Mitra pemasok aktif</span>
                </div>
                <div class="h-12 w-12 rounded-xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400">
                    <i class="fa-solid fa-truck-field text-xl"></i>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-500 to-purple-400"></div>
        </div>
    @endif

    <!-- Card 3: Depends on Role -->
    @if(Auth::user()->hasRole('Supplier'))
        <!-- Card 3 for Supplier: Supplier Name -->
        <div class="glass-panel p-6 rounded-2xl relative overflow-hidden transition-all duration-300 hover:translate-y-[-2px] hover:border-slate-700/50">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Profil Supplier</p>
                    <h3 class="text-xl font-bold text-white mt-3 truncate w-48">
                        {{ Auth::user()->supplier->name ?? 'Pemasok Terdaftar' }}
                    </h3>
                    <span class="text-xs text-slate-500 mt-1 block">ID: SUP-{{ str_pad(Auth::user()->supplier_id ?? 0, 3, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="h-12 w-12 rounded-xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center text-purple-400">
                    <i class="fa-solid fa-building text-xl"></i>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-purple-500 to-pink-400"></div>
        </div>
    @else
        <!-- Card 3 for Admin/Staff: Warehouse Asset Value -->
        <div class="glass-panel p-6 rounded-2xl relative overflow-hidden transition-all duration-300 hover:translate-y-[-2px] hover:border-slate-700/50">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Nilai Aset Gudang</p>
                    <h3 class="text-2xl font-bold text-emerald-400 mt-2">Rp {{ number_format($totalValue, 0, ',', '.') }}</h3>
                    <span class="text-xs text-slate-500 mt-1.5 block">Akumulasi harga beli × stok</span>
                </div>
                <div class="h-12 w-12 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400">
                    <i class="fa-solid fa-money-bill-trend-up text-xl"></i>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-500 to-teal-400"></div>
        </div>
    @endif
</div>

<!-- LOW STOCK WARNINGS -->
@if($lowStockProducts->count() > 0)
    <div class="mb-8 p-6 glass-panel border border-amber-500/20 rounded-2xl bg-gradient-to-r from-amber-500/5 via-slate-900/10 to-slate-900/10">
        <div class="flex items-center gap-3 mb-4">
            <div class="h-8 w-8 rounded-lg bg-amber-500/10 flex items-center justify-center text-amber-400">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <div>
                <h4 class="text-md font-bold text-amber-400">Peringatan: Stok Barang Menipis!</h4>
                <p class="text-xs text-slate-400">Barang-barang berikut memiliki jumlah stok di bawah batas minimum.</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($lowStockProducts as $lowProduct)
                <div class="glass-card p-4 rounded-xl flex items-center justify-between border border-slate-800">
                    <div class="min-w-0 pr-4">
                        <h5 class="text-sm font-semibold text-white truncate">{{ $lowProduct->name }}</h5>
                        <p class="text-xs text-slate-400 mt-0.5">SKU: <span class="text-slate-300 font-mono">{{ $lowProduct->sku }}</span></p>
                    </div>
                    <div class="text-right shrink-0">
                        <span class="text-xs font-bold text-rose-400 bg-rose-500/10 border border-rose-500/20 px-2 py-0.5 rounded">
                            Stok: {{ $lowProduct->stock }} / {{ $lowProduct->minimum_stock }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="mb-8 p-4 glass-panel border border-emerald-500/10 rounded-2xl bg-emerald-500/5 flex items-center gap-3 text-emerald-400">
        <i class="fa-solid fa-circle-check text-lg"></i>
        <span class="text-sm font-medium">Seluruh produk memiliki stok aman di atas batas minimum.</span>
    </div>
@endif

<!-- CHART & HISTORIC ACTIVITY -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Left: Mutation Chart (2 Cols) -->
    <div class="glass-panel p-6 rounded-2xl lg:col-span-2 flex flex-col justify-between">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-md font-bold text-white">Grafik Arus Barang (7 Hari Terakhir)</h3>
                <p class="text-xs text-slate-400">Aktivitas penambahan (In) & pengurangan (Out) stok harian</p>
            </div>
            <div class="flex gap-4 text-xs">
                <span class="flex items-center gap-1.5 text-slate-400">
                    <span class="h-3 w-3 rounded bg-blue-500 inline-block"></span> Barang Masuk
                </span>
                <span class="flex items-center gap-1.5 text-slate-400">
                    <span class="h-3 w-3 rounded bg-rose-500 inline-block"></span> Barang Keluar
                </span>
            </div>
        </div>

        <!-- Render HTML5 Canvas for ChartJS -->
        <div class="relative h-64 w-full">
            <canvas id="mutationChart"></canvas>
        </div>
    </div>

    <!-- Right: Recent Mutations (1 Col) -->
    <div class="glass-panel p-6 rounded-2xl flex flex-col justify-between">
        <div>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-md font-bold text-white">Mutasi Terakhir</h3>
                    <p class="text-xs text-slate-400">5 transaksi mutasi stok terbaru</p>
                </div>
                @if(Auth::user()->hasRole('Super Admin') || Auth::user()->hasRole('Staff Gudang'))
                    <a href="{{ route('mutations.index') }}" class="text-xs font-semibold text-brand-400 hover:text-brand-300 transition-colors">
                        Lihat Semua
                    </a>
                @endif
            </div>

            <div class="space-y-4">
                @forelse($recentMutations as $mut)
                    <div class="flex items-start gap-3 pb-3.5 border-b border-slate-800/80 last:border-0 last:pb-0">
                        @if($mut->type === 'in')
                            <div class="h-8 w-8 rounded-lg bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400 shrink-0 mt-0.5">
                                <i class="fa-solid fa-arrow-down-long"></i>
                            </div>
                        @else
                            <div class="h-8 w-8 rounded-lg bg-rose-500/10 border border-rose-500/20 flex items-center justify-center text-rose-400 shrink-0 mt-0.5">
                                <i class="fa-solid fa-arrow-up-long"></i>
                            </div>
                        @endif
                        <div class="min-w-0 flex-1">
                            <div class="flex justify-between items-start gap-2">
                                <h5 class="text-sm font-semibold text-slate-200 truncate">{{ $mut->product->name }}</h5>
                                <span class="text-xs font-bold text-white shrink-0">
                                    {{ $mut->type === 'in' ? '+' : '-' }}{{ $mut->quantity }}
                                </span>
                            </div>
                            <p class="text-xs text-slate-400 truncate mt-0.5">{{ $mut->notes ?? 'Tidak ada catatan' }}</p>
                            <div class="flex items-center gap-1.5 mt-1 text-2xs text-slate-500 font-medium">
                                <span class="truncate max-w-[80px]"><i class="fa-solid fa-user text-3xs mr-1"></i>{{ $mut->user->name }}</span>
                                <span>•</span>
                                <span>{{ $mut->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="py-8 text-center">
                        <i class="fa-solid fa-box-open text-3xl text-slate-700 mb-2 block"></i>
                        <span class="text-xs text-slate-500">Belum ada mutasi tercatat</span>
                    </div>
                @endforelse
            </div>
        </div>

        @if(Auth::user()->hasRole('Staff Gudang'))
            <a href="{{ route('mutations.create') }}" class="w-full mt-6 py-2.5 px-4 bg-slate-900 border border-slate-800 hover:bg-slate-800/80 text-xs font-semibold rounded-xl text-center text-slate-200 hover:text-white transition-all duration-200">
                <i class="fa-solid fa-plus mr-1.5 text-brand-400"></i> Catat Transaksi Stok
            </a>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<!-- Load ChartJS via CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const chartData = @json($chartData);
        
        const labels = chartData.map(item => item.date);
        const inDataset = chartData.map(item => item.in);
        const outDataset = chartData.map(item => item.out);

        const ctx = document.getElementById('mutationChart').getContext('2d');
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Barang Masuk',
                        data: inDataset,
                        backgroundColor: 'rgba(14, 165, 233, 0.65)',
                        borderColor: '#0ea5e9',
                        borderWidth: 1.5,
                        borderRadius: 6,
                    },
                    {
                        label: 'Barang Keluar',
                        data: outDataset,
                        backgroundColor: 'rgba(244, 63, 94, 0.65)',
                        borderColor: '#f43f5e',
                        borderWidth: 1.5,
                        borderRadius: 6,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        padding: 12,
                        backgroundColor: 'rgba(15, 23, 42, 0.95)',
                        titleColor: '#fff',
                        bodyColor: '#cbd5e1',
                        borderColor: 'rgba(255,255,255,0.08)',
                        borderWidth: 1,
                        bodyFont: {
                            family: 'Outfit'
                        },
                        titleFont: {
                            family: 'Outfit',
                            weight: 'bold'
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#64748b',
                            font: {
                                family: 'Outfit',
                                size: 11
                            }
                        }
                    },
                    y: {
                        grid: {
                            color: 'rgba(51, 65, 85, 0.25)'
                        },
                        ticks: {
                            color: '#64748b',
                            font: {
                                family: 'Outfit',
                                size: 11
                            },
                            precision: 0
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
