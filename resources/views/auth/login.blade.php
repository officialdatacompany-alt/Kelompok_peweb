<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-950 text-slate-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inventory SaaS</title>
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
        .glow-effect {
            box-shadow: 0 0 40px 5px rgba(14, 165, 233, 0.15);
        }
    </style>
</head>
<body class="h-full flex items-center justify-center p-6 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-slate-900 via-slate-950 to-slate-950">
    <div class="w-full max-w-md">
        <!-- Logo Header -->
        <div class="text-center mb-8">
            <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-tr from-brand-600 to-indigo-500 shadow-xl shadow-brand-500/25 mb-4">
                <i class="fa-solid fa-boxes-stacked text-2xl text-white"></i>
            </div>
            <h2 class="text-2xl font-bold tracking-tight bg-gradient-to-r from-white to-slate-400 bg-clip-text text-transparent">GudangSaaS</h2>
            <p class="text-sm text-slate-400 mt-1">Sistem Informasi Manajemen Inventaris Gudang</p>
        </div>

        <!-- Glass card form wrapper -->
        <div class="glow-effect bg-slate-900/60 backdrop-blur-xl border border-slate-800/80 rounded-3xl p-8 shadow-2xl">
            @if(session('success'))
                <div class="mb-5 flex items-center gap-3 p-4 rounded-xl border border-emerald-500/20 bg-emerald-500/10 text-emerald-400">
                    <i class="fa-solid fa-circle-check text-md"></i>
                    <span class="text-xs font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                
                <!-- Email field -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-500">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                            class="block w-full pl-10 pr-4 py-3 bg-slate-950 border border-slate-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 rounded-xl text-sm text-slate-200 placeholder-slate-600 focus:outline-none transition-all duration-200"
                            placeholder="nama@gudang.com">
                    </div>
                    @error('email')
                        <span class="text-rose-500 text-xs mt-1.5 block font-medium">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password field -->
                <div>
                    <label for="password" class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-500">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <input type="password" name="password" id="password" required
                            class="block w-full pl-10 pr-4 py-3 bg-slate-950 border border-slate-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 rounded-xl text-sm text-slate-200 placeholder-slate-600 focus:outline-none transition-all duration-200"
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center text-xs text-slate-400 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded bg-slate-950 border-slate-800 text-brand-600 focus:ring-brand-500 mr-2 h-4 w-4">
                        Ingat Saya
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-600 text-sm font-semibold rounded-xl text-white shadow-lg shadow-brand-500/20 hover:shadow-brand-500/30 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 focus:ring-offset-slate-950 transition-all duration-200">
                    Masuk ke Sistem <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                </button>
            </form>
        </div>

        <!-- Demonstration Accounts Card -->
        <div class="mt-8 bg-slate-900/30 border border-slate-800/40 rounded-2xl p-5 text-center">
            <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">Akun Demo (Siap Pakai)</h3>
            <div class="grid grid-cols-1 gap-2 text-left">
                <div class="p-2.5 rounded-lg bg-slate-950/50 border border-slate-800/50 text-2xs flex justify-between items-center">
                    <div>
                        <span class="font-semibold text-emerald-400 mr-1.5">[Owner/Admin]</span>
                        <span class="text-slate-300">admin@inventory.com</span>
                    </div>
                    <span class="bg-slate-800 px-1.5 py-0.5 rounded text-slate-400">pwd: password</span>
                </div>
                <div class="p-2.5 rounded-lg bg-slate-950/50 border border-slate-800/50 text-2xs flex justify-between items-center">
                    <div>
                        <span class="font-semibold text-blue-400 mr-1.5">[Staff Gudang]</span>
                        <span class="text-slate-300">staff@inventory.com</span>
                    </div>
                    <span class="bg-slate-800 px-1.5 py-0.5 rounded text-slate-400">pwd: password</span>
                </div>
                <div class="p-2.5 rounded-lg bg-slate-950/50 border border-slate-800/50 text-2xs flex justify-between items-center">
                    <div>
                        <span class="font-semibold text-amber-400 mr-1.5">[Supplier]</span>
                        <span class="text-slate-300">supplier@inventory.com</span>
                    </div>
                    <span class="bg-slate-800 px-1.5 py-0.5 rounded text-slate-400">pwd: password</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
