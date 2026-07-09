<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-950 text-slate-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Inventory SaaS</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            900: '#0c4a6e',
                        }
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Glassmorphism utility classes */
        .glass-panel {
            background: rgba(15, 23, 42, 0.45);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .glass-card {
            background: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.03);
        }
    </style>
    @yield('styles')
</head>
<body class="h-full font-sans antialiased">
    <div class="flex h-full min-h-screen">
        <!-- SIDEBAR -->
        <aside class="w-64 glass-panel flex flex-col justify-between border-r border-slate-800 shrink-0">
            <div>
                <!-- Brand logo -->
                <div class="flex items-center gap-3 px-6 py-6 border-b border-slate-800/80">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-tr from-brand-600 to-indigo-500 shadow-lg shadow-brand-500/20">
                        <i class="fa-solid fa-boxes-stacked text-lg text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-md font-bold tracking-tight bg-gradient-to-r from-white to-slate-400 bg-clip-text text-transparent">GudangSaaS</h1>
                        <span class="text-xs text-slate-500">Inventory System</span>
                    </div>
                </div>

                <!-- User profile summary -->
                <div class="px-6 py-5 border-b border-slate-800/50 bg-slate-900/20">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center font-semibold text-slate-200">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                        <div class="overflow-hidden">
                            <h4 class="text-sm font-semibold truncate">{{ Auth::user()->name }}</h4>
                            @if(Auth::user()->hasRole('Super Admin'))
                                <span class="inline-flex items-center rounded-md bg-emerald-500/10 px-2 py-0.5 text-2xs font-medium text-emerald-400 ring-1 ring-inset ring-emerald-500/20">Owner</span>
                            @elseif(Auth::user()->hasRole('Staff Gudang'))
                                <span class="inline-flex items-center rounded-md bg-blue-500/10 px-2 py-0.5 text-2xs font-medium text-blue-400 ring-1 ring-inset ring-blue-500/20">Staff Gudang</span>
                            @else
                                <span class="inline-flex items-center rounded-md bg-amber-500/10 px-2 py-0.5 text-2xs font-medium text-amber-400 ring-1 ring-inset ring-amber-500/20">Supplier</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Navigation items -->
                <nav class="px-4 py-4 space-y-1.5">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ Route::is('dashboard') ? 'bg-brand-600/15 text-brand-500 border border-brand-500/20' : 'text-slate-400 hover:bg-slate-900/50 hover:text-slate-200' }}">
                        <i class="fa-solid fa-chart-pie w-5"></i>
                        <span>Dashboard Utama</span>
                    </a>

                    <!-- Super Admin and Staff Gudang: Products List -->
                    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->hasRole('Staff Gudang'))
                        <a href="{{ route('products.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ Route::is('products.*') ? 'bg-brand-600/15 text-brand-500 border border-brand-500/20' : 'text-slate-400 hover:bg-slate-900/50 hover:text-slate-200' }}">
                            <i class="fa-solid fa-box w-5"></i>
                            <span>Data Barang</span>
                        </a>
                        
                        <a href="{{ route('mutations.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ Route::is('mutations.*') ? 'bg-brand-600/15 text-brand-500 border border-brand-500/20' : 'text-slate-400 hover:bg-slate-900/50 hover:text-slate-200' }}">
                            <i class="fa-solid fa-clock-rotate-left w-5"></i>
                            <span>Riwayat Mutasi</span>
                        </a>
                    @endif

                    <!-- Staff Gudang: Record Inbound/Outbound -->
                    @if(Auth::user()->hasRole('Staff Gudang'))
                        <div class="pt-4 pb-1 px-4 text-xs font-semibold tracking-wider text-slate-500 uppercase">Aksi Gudang</div>
                        <a href="{{ route('mutations.create') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium bg-gradient-to-r from-brand-600/10 to-indigo-500/10 border border-brand-500/20 text-brand-400 hover:from-brand-600/20 hover:to-indigo-500/20 transition-all duration-200">
                            <i class="fa-solid fa-right-left w-5 text-brand-500"></i>
                            <span>Transaksi Stok</span>
                        </a>
                    @endif

                    <!-- Super Admin: Reports -->
                    @if(Auth::user()->hasRole('Super Admin'))
                        <div class="pt-4 pb-1 px-4 text-xs font-semibold tracking-wider text-slate-500 uppercase">Laporan</div>
                        <a href="{{ route('reports.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ Route::is('reports.*') ? 'bg-brand-600/15 text-brand-500 border border-brand-500/20' : 'text-slate-400 hover:bg-slate-900/50 hover:text-slate-200' }}">
                            <i class="fa-solid fa-file-pdf w-5"></i>
                            <span>Laporan Mutasi</span>
                        </a>
                    @endif
                </nav>
            </div>

            <!-- Logout area -->
            <div class="p-4 border-t border-slate-800/80">
                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar dari sistem?')">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-rose-400 hover:bg-rose-500/10 transition-all duration-200">
                        <i class="fa-solid fa-right-from-bracket w-5 text-rose-500"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- MAIN LAYOUT CONTENT -->
        <main class="flex-1 flex flex-col min-w-0 bg-slate-950 overflow-y-auto">
            <!-- Header bar -->
            <header class="h-16 flex items-center justify-between px-8 border-b border-slate-800/60 glass-panel sticky top-0 z-10">
                <div>
                    <h2 class="text-lg font-semibold tracking-tight text-white">@yield('page_title', 'Dashboard')</h2>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-xs text-slate-400 font-medium">
                        <span class="inline-block h-2 w-2 rounded-full bg-emerald-500 animate-pulse mr-2"></span>
                        Server Active
                    </div>
                </div>
            </header>

            <!-- Main Content panel -->
            <div class="flex-1 p-8">
                <!-- Notifications -->
                @if(session('success'))
                    <div class="mb-6 flex items-center gap-3 p-4 rounded-xl border border-emerald-500/30 bg-emerald-500/10 text-emerald-400">
                        <i class="fa-solid fa-circle-check text-lg"></i>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 flex items-center gap-3 p-4 rounded-xl border border-rose-500/30 bg-rose-500/10 text-rose-400">
                        <i class="fa-solid fa-circle-xmark text-lg"></i>
                        <span class="text-sm font-medium">{{ session('error') }}</span>
                    </div>
                @endif

                <!-- Content yielded from children -->
                @yield('content')
            </div>
        </main>
    </div>
    @yield('scripts')
</body>
</html>
