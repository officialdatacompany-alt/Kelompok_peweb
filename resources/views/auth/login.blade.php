<!DOCTYPE html>
<html lang="id" class="h-full bg-[#F3F4F6]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GudangSaaS</title>
    <!-- Google Fonts for premium typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brandPurple: '#7C3AED',
                        brandDark: '#111827',
                    },
                    animation: {
                        'slow-float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        h1, h2, h3, .font-heading {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 md:p-12 relative overflow-x-hidden bg-[#F3F4F6] text-gray-900 antialiased">
    
    <!-- Faint geometric grid lines background -->
    <div class="absolute inset-0 pointer-events-none opacity-[0.04] z-0" 
         style="background-size: 40px 40px; background-image: linear-gradient(to right, #000 1px, transparent 1px), linear-gradient(to bottom, #000 1px, transparent 1px);">
    </div>

    <!-- Soft ambient colorful glows -->
    <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-purple-300/15 rounded-full blur-[120px] pointer-events-none z-0"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[45%] h-[45%] bg-blue-300/10 rounded-full blur-[100px] pointer-events-none z-0"></div>

    <!-- Main Container -->
    <div class="w-full max-w-6xl relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        
        <!-- Left Side: Branding & Cyber Security Monitor (KeyGuard style) -->
        <div class="lg:col-span-7 flex flex-col items-center lg:items-start text-center lg:text-left">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-purple-100 text-brandPurple rounded-full text-xs font-bold tracking-wide uppercase mb-6 animate-bounce">
                <span>🛡️</span> Bank-Grade Secure Systems
            </div>
            
            <h1 class="text-4xl md:text-5xl font-black text-gray-900 leading-[1.15] mb-6 tracking-tight">
                Supercharge Your Inventory 
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-brandPurple to-indigo-600">Secrets</span> 
                <span class="inline-block transform -rotate-6 hover:rotate-12 transition-transform duration-300 cursor-default">🔒</span> 
                for Ultimate Protection
            </h1>
            
            <p class="text-base text-gray-600 mb-8 max-w-lg leading-relaxed">
                No more password panic. GudangSaaS has got your back with unhackable vaults, secure stock mutations tracking, and next-level control panels.
            </p>

            <!-- Angled monitor frame (floating and interactive) -->
            <div class="relative w-full max-w-lg hidden lg:block animate-slow-float mt-2">
                <!-- Neon Ambient Purple Glow Behind Monitor -->
                <div class="absolute -inset-1.5 bg-gradient-to-r from-brandPurple to-indigo-500 rounded-3xl blur-2xl opacity-20 animate-pulse"></div>
                
                <!-- Angled Monitor Frame Wrapper -->
                <div class="relative aspect-video rounded-2xl bg-slate-900 shadow-2xl p-2 border-4 border-slate-700 w-full overflow-hidden [transform-style:preserve-3d] [perspective:1000px] [transform:rotateX(6deg)_rotateY(-10deg)_rotateZ(2deg)] hover:[transform:rotateX(2deg)_rotateY(-4deg)_rotateZ(1deg)] transition-all duration-500 ease-out group">
                    <!-- Inner Screen Reflection -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/5 to-white/10 pointer-events-none z-20"></div>
                    
                    <!-- 3D Render Image -->
                    <img src="{{ asset('images/hero-machine.png') }}" alt="GudangSaaS Secure Control Room" class="w-full h-full object-cover rounded-xl z-10 relative">

                    <!-- Status LED lights -->
                    <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex items-center gap-2 z-20">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse" title="System Online"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-brandPurple animate-ping" title="Secured Sync"></span>
                    </div>
                </div>

                <!-- Monitor Base Shadow -->
                <div class="absolute -bottom-6 left-10 right-10 h-3 bg-black/10 blur-xl rounded-full"></div>
            </div>
        </div>

        <!-- Right Side: Glassmorphic Login Form Card -->
        <div class="lg:col-span-5 w-full">
            <div class="bg-white/70 backdrop-blur-md border border-white/45 rounded-3xl p-8 shadow-xl flex flex-col gap-6 relative overflow-hidden">
                
                <!-- Form Header with Brand -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-brandPurple to-purple-600 rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/30">
                        <i class="fa-solid fa-boxes-stacked text-lg text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-extrabold text-gray-900 tracking-tight">GudangSaaS</h2>
                        <p class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Secure Portal</p>
                    </div>
                </div>

                <!-- Laravel Success Alert -->
                @if(session('success'))
                    <div class="flex items-center gap-3 p-4 rounded-2xl border border-emerald-500/20 bg-emerald-500/10 text-emerald-700 text-xs font-semibold">
                        <i class="fa-solid fa-circle-check text-sm text-emerald-500"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <!-- Email input -->
                    <div>
                        <label for="email" class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-wider mb-2">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <i class="fa-solid fa-envelope text-xs"></i>
                            </div>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                                class="block w-full pl-10 pr-4 py-3 bg-white/60 border border-gray-200 focus:border-brandPurple focus:ring-2 focus:ring-brandPurple/20 rounded-xl text-sm text-gray-900 placeholder-gray-400 focus:outline-none transition-all duration-200 shadow-inner"
                                placeholder="nama@gudang.com">
                        </div>
                        @error('email')
                            <span class="text-rose-500 text-xs mt-1.5 block font-bold">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div>
                        <label for="password" class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-wider mb-2">Kata Sandi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <i class="fa-solid fa-lock text-xs"></i>
                            </div>
                            <input type="password" name="password" id="password" required
                                class="block w-full pl-10 pr-4 py-3 bg-white/60 border border-gray-200 focus:border-brandPurple focus:ring-2 focus:ring-brandPurple/20 rounded-xl text-sm text-gray-900 placeholder-gray-400 focus:outline-none transition-all duration-200 shadow-inner"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center text-xs text-gray-500 cursor-pointer font-semibold select-none">
                            <input type="checkbox" name="remember" class="rounded bg-white/65 border-gray-200 text-brandPurple focus:ring-brandPurple/40 mr-2 h-4 w-4 cursor-pointer">
                            Ingat Saya
                        </label>
                    </div>

                    <!-- Submit Button (KeyGuard Styled purple CTA button) -->
                    <button type="submit" class="w-full py-3.5 bg-[#7C3AED] hover:bg-[#6D28D9] text-white font-extrabold text-sm rounded-full transition-all duration-300 transform hover:scale-[1.02] shadow-lg shadow-purple-500/25 active:scale-[0.98] flex items-center justify-center gap-2">
                        Masuk ke Sistem <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </form>

                <!-- Demonstration Accounts Panel (Clean CSS credentials bento layout) -->
                <div class="bg-purple-50/50 border border-purple-100/50 rounded-2xl p-4">
                    <h3 class="text-[10px] font-extrabold text-brandPurple uppercase tracking-widest text-center mb-3">Akun Demo (Klik untuk Autofill)</h3>
                    <div class="space-y-2">
                        <!-- Owner -->
                        <div class="flex items-center justify-between bg-white/80 border border-white/60 rounded-xl p-2.5 text-xs cursor-pointer hover:bg-white hover:border-brandPurple/20 transition-all duration-200 shadow-sm group"
                             onclick="document.getElementById('email').value='admin@inventory.com'; document.getElementById('password').value='password';">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 shadow-sm animate-pulse"></span>
                                <span class="font-bold text-gray-800">Owner</span>
                                <span class="text-gray-400 text-[10px] truncate">admin@inventory.com</span>
                            </div>
                            <span class="text-[10px] bg-gray-100 text-gray-500 px-1.5 py-0.5 rounded font-mono">pwd: password</span>
                        </div>
                        <!-- Staff Gudang -->
                        <div class="flex items-center justify-between bg-white/80 border border-white/60 rounded-xl p-2.5 text-xs cursor-pointer hover:bg-white hover:border-brandPurple/20 transition-all duration-200 shadow-sm group"
                             onclick="document.getElementById('email').value='staff@inventory.com'; document.getElementById('password').value='password';">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-blue-500 shadow-sm"></span>
                                <span class="font-bold text-gray-800">Staff</span>
                                <span class="text-gray-400 text-[10px] truncate">staff@inventory.com</span>
                            </div>
                            <span class="text-[10px] bg-gray-100 text-gray-500 px-1.5 py-0.5 rounded font-mono">pwd: password</span>
                        </div>
                        <!-- Supplier -->
                        <div class="flex items-center justify-between bg-white/80 border border-white/60 rounded-xl p-2.5 text-xs cursor-pointer hover:bg-white hover:border-brandPurple/20 transition-all duration-200 shadow-sm group"
                             onclick="document.getElementById('email').value='supplier@inventory.com'; document.getElementById('password').value='password';">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-amber-500 shadow-sm"></span>
                                <span class="font-bold text-gray-800">Supplier</span>
                                <span class="text-gray-400 text-[10px] truncate">supplier@inventory.com</span>
                            </div>
                            <span class="text-[10px] bg-gray-100 text-gray-500 px-1.5 py-0.5 rounded font-mono">pwd: password</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>
</html>
