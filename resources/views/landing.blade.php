<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KeyGuard - Supercharge Your Secrets</title>
    <!-- Google Fonts for premium typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        h1, h2, h3, .font-heading {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="bg-[#F3F4F6] text-gray-900 antialiased relative min-h-screen overflow-x-hidden">
    
    <!-- Faint geometric grid lines background -->
    <div class="absolute inset-0 pointer-events-none opacity-[0.04] z-0" 
         style="background-size: 40px 40px; background-image: linear-gradient(to right, #000 1px, transparent 1px), linear-gradient(to bottom, #000 1px, transparent 1px);">
    </div>

    <!-- Soft ambient colorful glows -->
    <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-purple-300/20 rounded-full blur-[120px] pointer-events-none z-0"></div>
    <div class="absolute top-[30%] right-[-10%] w-[45%] h-[45%] bg-blue-300/15 rounded-full blur-[100px] pointer-events-none z-0"></div>

    <div class="relative z-10 min-h-screen flex flex-col">
        
        <!-- Navigation Bar (Sticky with Glassmorphism on Scroll) -->
        <nav x-data="{ scrolled: false }" 
             @scroll.window="scrolled = window.scrollY > 20"
             :class="scrolled ? 'bg-white/80 backdrop-blur-md border-b border-gray-200/50 shadow-sm py-4' : 'bg-transparent py-6'"
             class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 px-6">
            <div class="container mx-auto flex justify-between items-center">
                <a href="#" class="flex items-center gap-2 group">
                    <x-logo />
                </a>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="text-sm font-semibold text-gray-600 hover:text-brandPurple transition-colors duration-200">Features</a>
                    <a href="#pricing" class="text-sm font-semibold text-gray-600 hover:text-brandPurple transition-colors duration-200">Pricing</a>
                    <a href="#download" class="text-sm font-semibold text-gray-600 hover:text-brandPurple transition-colors duration-200">Download</a>
                    <a href="#blog" class="text-sm font-semibold text-gray-600 hover:text-brandPurple transition-colors duration-200">Blog</a>
                    <a href="#support" class="text-sm font-semibold text-gray-600 hover:text-brandPurple transition-colors duration-200">Support</a>
                </div>
                
                <div>
                    <button class="bg-[#7C3AED] text-white font-bold text-sm px-6 py-2.5 rounded-full hover:bg-[#6D28D9] transition-all duration-300 transform hover:scale-105 shadow-lg shadow-purple-500/30">
                        Try it Free
                    </button>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <header class="container mx-auto px-6 pt-32 pb-16 lg:pt-48 lg:pb-24 flex-1">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                
                <!-- Left Side -->
                <div class="text-center lg:text-left flex flex-col items-center lg:items-start">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-purple-100 text-brandPurple rounded-full text-xs font-bold tracking-wide uppercase mb-6 animate-bounce">
                        <span>🚀</span> Version 2.0 Is Live
                    </div>
                    <h1 class="text-5xl lg:text-6xl font-black text-gray-900 leading-[1.1] mb-6 tracking-tight">
                        Supercharge Your 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-brandPurple to-indigo-600">Secrets</span> 
                        <span class="inline-block transform -rotate-6 hover:rotate-12 transition-transform duration-300 text-5xl lg:text-6xl cursor-default">🔒</span> 
                        for Ultimate Protection
                    </h1>
                    <p class="text-lg text-gray-600 mb-8 max-w-lg leading-relaxed">
                        No more password panic. KeyGuard has got your back with unhackable vaults, instant logins, and next-level tools for your always-on life.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <button class="bg-[#7C3AED] text-white font-extrabold rounded-full px-8 py-4 hover:bg-[#6D28D9] transition-all duration-300 transform hover:scale-105 shadow-lg shadow-purple-500/30 text-base">
                            Try it Free
                        </button>
                        <a href="#features" class="flex items-center gap-2 text-gray-700 hover:text-brandPurple font-semibold transition-colors duration-200">
                            Explore Features <span>→</span>
                        </a>
                    </div>
                </div>
                
                <!-- Right Side (Angled hyper-realistic CSS monitor frame) -->
                <div class="flex justify-center lg:justify-end">
                    <div class="relative w-full max-w-2xl animate-slow-float">
                        <!-- Neon Ambient Purple Glow Behind Monitor -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-brandPurple to-indigo-500 rounded-3xl blur-2xl opacity-30 animate-pulse"></div>
                        
                        <!-- Angled Monitor Frame Wrapper -->
                        <div class="relative aspect-video rounded-2xl bg-slate-900 shadow-2xl p-2 border-4 border-slate-700 w-full overflow-hidden [transform-style:preserve-3d] [perspective:1000px] [transform:rotateX(6deg)_rotateY(-10deg)_rotateZ(2deg)] hover:[transform:rotateX(2deg)_rotateY(-4deg)_rotateZ(1deg)] transition-all duration-500 ease-out group">
                            
                            <!-- Inner Screen Reflection & Glare -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/5 to-white/10 pointer-events-none z-20"></div>
                            
                            <!-- Premium Rendered Image -->
                            <img src="{{ asset('images/hero-machine.png') }}" alt="KeyGuard Machine" class="w-full h-full object-cover rounded-xl z-10 relative">

                            <!-- Status LED lights at the bottom center of the frame -->
                            <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex items-center gap-2 z-20">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse" title="System Online"></span>
                                <span class="w-1.5 h-1.5 rounded-full bg-brandPurple animate-ping" title="Secured Sync"></span>
                            </div>
                        </div>

                        <!-- Monitor Base Shadow -->
                        <div class="absolute -bottom-8 left-1/12 right-1/12 h-4 bg-black/10 blur-xl rounded-full"></div>
                    </div>
                </div>

            </div>
        </header>
        
        <!-- Feature Bento Grid Section -->
        <section id="features" class="container mx-auto px-6 py-20 relative">
            <div class="absolute top-[40%] left-[-15%] w-[40%] h-[40%] bg-purple-200/25 rounded-full blur-[100px] pointer-events-none z-0"></div>
            <div class="relative z-10">
                <x-feature-grid />
            </div>
        </section>

        <!-- Testimonial Slider Section -->
        <section id="testimonials" class="py-20 bg-gradient-to-b from-transparent to-white/30 border-t border-gray-200/30">
            <div class="container mx-auto px-6">
                <x-testimonials />
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-gray-400 py-12 border-t border-gray-800">
            <div class="container mx-auto px-6 text-center flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-brandPurple rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <span class="text-lg font-bold text-white">KeyGuard</span>
                </div>
                <p class="text-sm">&copy; 2026 KeyGuard Security Inc. All rights reserved. Encrypted with AES-256.</p>
                <div class="flex gap-6 text-sm">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>