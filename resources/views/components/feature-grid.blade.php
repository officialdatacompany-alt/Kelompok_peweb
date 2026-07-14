<div>
    <!-- Title Section -->
    <div class="text-center mb-16">
        <h2 class="text-4xl font-extrabold text-gray-900 leading-tight">
            Everything You Need. <span class="text-brandPurple">Nothing You Don't.</span>
        </h2>
        <p class="text-gray-500 mt-3 max-w-xl mx-auto">
            KeyGuard packs a suite of next-gen security features into one elegant, glassmorphic dashboard.
        </p>
    </div>

    <!-- Responsive Bento Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Card 1: Dark Web Radar (Col-span-1) -->
        <div class="bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm flex flex-col gap-4 relative overflow-hidden group">
            
            <!-- Radar Sweep Background Animation -->
            <div class="absolute inset-0 overflow-hidden rounded-3xl opacity-10 pointer-events-none z-0">
                <div class="w-full h-full border border-red-500/20 rounded-full scale-110 flex items-center justify-center">
                    <div class="w-2/3 h-2/3 border border-red-500/25 rounded-full flex items-center justify-center">
                        <div class="w-1/3 h-1/3 border border-red-500/30 rounded-full"></div>
                    </div>
                </div>
                <!-- Rotating Sweep Line -->
                <div class="absolute top-1/2 left-1/2 w-1/2 h-[2px] bg-gradient-to-r from-red-500 to-transparent origin-left [transform-origin:left_center] animate-[spin_4s_linear_infinite]"></div>
            </div>

            <div class="relative z-10 flex items-center gap-4">
                <div class="relative flex h-14 w-14 items-center justify-center rounded-2xl bg-red-50 border border-red-100">
                    <div class="absolute inline-flex h-10 w-10 animate-ping rounded-full bg-red-400 opacity-40"></div>
                    <div class="relative inline-flex h-8 w-8 items-center justify-center rounded-full bg-red-500">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Dark Web Radar</h3>
                    <p class="text-xs text-gray-400 uppercase tracking-wider font-bold">Live Monitoring</p>
                </div>
            </div>
            
            <p class="text-gray-600 text-sm relative z-10 leading-relaxed">
                We crawl the dark corners of the web 24/7. The moment your credentials surface on a breach list, you are the first to know.
            </p>
            
            <div class="mt-auto flex items-center gap-2 text-red-500 font-bold text-sm relative z-10">
                <span class="h-2.5 w-2.5 rounded-full bg-red-500 animate-pulse"></span>
                Scanning leaks in real time…
            </div>
        </div>

        <!-- Card 2: Password Generator (Col-span-2) -->
        <div x-data="{ 
            password: 'K#9mQ!rLz2@b', 
            matrix: [
                'K#9mQ!rLz2@bWsXvP4$uN',
                'g7Ty&J^0eCdF*hA3koBqM',
                'Px!2Rs5VwD#oU@LnZe9fG',
                'jE4mBv$Kc!Iy7aTs^WrXn',
                'Qf#2zU8Ld*Mk!XoJpY5bCe',
                'H6Vc3Nr@9Gb$Zt!1dKwMql'
            ],
            generate() {
                const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()';
                let res = '';
                for (let i = 0; i < 16; i++) res += chars[Math.floor(Math.random() * chars.length)];
                this.password = res;
                
                this.matrix = this.matrix.map(row => {
                    let r = '';
                    for (let i = 0; i < 22; i++) r += chars[Math.floor(Math.random() * chars.length)];
                    return r;
                });
            }
        }" class="md:col-span-2 bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm flex flex-col gap-4 relative overflow-hidden group">
            
            <div>
                <h3 class="text-lg font-bold text-gray-900">Password Generator</h3>
                <p class="text-gray-600 text-sm leading-relaxed mt-1">
                    Create brute-force-proof credentials instantly. No patterns, no repeats — purely random, ultra-secure.
                </p>
            </div>
            
            <div class="flex-1 rounded-2xl bg-slate-950 p-4 font-mono text-xs overflow-hidden relative border border-slate-800 min-h-[120px]" aria-label="Simulated password generator matrix">
                <!-- Blurred rows -->
                <div class="flex flex-col gap-1 opacity-20 blur-[1.5px] select-none text-slate-400" aria-hidden="true">
                    <template x-for="row in matrix">
                        <span x-text="row" class="tracking-widest"></span>
                    </template>
                </div>
                
                <!-- Highlighted dynamic password in center -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="bg-gradient-to-r from-brandPurple to-indigo-600 text-white font-mono font-bold text-sm md:text-base px-6 py-2.5 rounded-full tracking-wider shadow-lg shadow-purple-500/30 flex items-center gap-3 border border-purple-400/20">
                        <span x-text="password"></span>
                        <!-- Copy button -->
                        <button @click="navigator.clipboard.writeText(password); alert('Password copied to clipboard!')" class="hover:text-purple-200 transition-colors" title="Copy to clipboard">
                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <button @click="generate()" class="self-start bg-[#7C3AED] text-white px-5 py-2.5 rounded-full text-sm font-bold hover:bg-[#6D28D9] transition-all duration-300 transform hover:scale-105 shadow-sm">
                Generate New
            </button>
        </div>

        <!-- Card 3: Device Sync (Col-span-1) -->
        <div class="bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm flex flex-col gap-4 relative overflow-hidden group">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span>🔄</span> Device Sync
            </h3>
            <p class="text-gray-600 text-sm leading-relaxed">
                Your vault, everywhere. Seamless sync across all your devices in real time.
            </p>
            
            <div class="flex items-center justify-center gap-2 py-6 relative z-10">
                <!-- Phone -->
                <div class="flex flex-col items-center gap-1.5 transition-transform duration-300 group-hover:scale-110">
                    <div class="rounded-xl bg-purple-50 border border-purple-100 p-3 text-brandPurple shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold uppercase text-gray-400 tracking-wider">Phone</span>
                </div>
                
                <!-- SVG Dotted Connector 1 -->
                <svg class="flex-1 h-3" viewBox="0 0 60 10" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0" y1="5" x2="60" y2="5" stroke="#7C3AED" stroke-width="2.5" stroke-dasharray="6 6" class="animate-dash" stroke-dashoffset="0"/>
                </svg>
                
                <!-- Laptop -->
                <div class="flex flex-col items-center gap-1.5 transition-transform duration-300 group-hover:scale-110">
                    <div class="rounded-xl bg-purple-50 border border-purple-100 p-3 text-brandPurple shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold uppercase text-gray-400 tracking-wider">Laptop</span>
                </div>
                
                <!-- SVG Dotted Connector 2 -->
                <svg class="flex-1 h-3" viewBox="0 0 60 10" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0" y1="5" x2="60" y2="5" stroke="#7C3AED" stroke-width="2.5" stroke-dasharray="6 6" class="animate-dash" stroke-dashoffset="0"/>
                </svg>
                
                <!-- Tablet -->
                <div class="flex flex-col items-center gap-1.5 transition-transform duration-300 group-hover:scale-110">
                    <div class="rounded-xl bg-purple-50 border border-purple-100 p-3 text-brandPurple shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold uppercase text-gray-400 tracking-wider">Tablet</span>
                </div>
            </div>
            
            <div class="text-center text-xs text-brandPurple font-bold mt-auto flex items-center justify-center gap-1">
                <span class="w-2.5 h-2.5 rounded-full bg-brandPurple animate-pulse"></span>
                Devices connected and encrypted
            </div>
        </div>

        <!-- Card 4: AES-256 Encryption (Col-span-1) -->
        <div class="bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm flex flex-col gap-4 relative overflow-hidden group">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <span>🔒</span> AES-256
                </h3>
                <span class="text-[10px] font-extrabold bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded-full uppercase tracking-wider">Secure Vault</span>
            </div>
            
            <p class="text-gray-600 text-sm leading-relaxed">
                Bank-grade AES-256 encryption wraps every single credential before it ever leaves your device.
            </p>
            
            <!-- Vault Layout Container -->
            <div class="relative bg-slate-900 rounded-2xl p-4 border border-slate-800 overflow-hidden flex items-center justify-between h-36 mt-auto">
                <!-- Secured Apps Grid -->
                <div class="grid grid-cols-2 gap-2 w-full pr-24 z-0">
                    <div class="bg-slate-950/80 border border-slate-800/80 rounded-xl p-1.5 flex items-center gap-1.5 shadow-inner">
                        <div class="w-5 h-5 rounded-full bg-blue-600 flex items-center justify-center text-[10px] font-bold text-white shadow-sm">G</div>
                        <span class="text-[9px] font-bold text-gray-300 truncate">Google</span>
                    </div>
                    <div class="bg-slate-950/80 border border-slate-800/80 rounded-xl p-1.5 flex items-center gap-1.5 shadow-inner">
                        <div class="w-5 h-5 rounded-full bg-orange-100 flex items-center justify-center text-xs shadow-sm">🦊</div>
                        <span class="text-[9px] font-bold text-gray-300 truncate">Firefox</span>
                    </div>
                    <div class="bg-slate-950/80 border border-slate-800/80 rounded-xl p-1.5 flex items-center gap-1.5 shadow-inner">
                        <div class="w-5 h-5 rounded-full bg-slate-850 flex items-center justify-center text-xs shadow-sm">🐙</div>
                        <span class="text-[9px] font-bold text-gray-300 truncate">GitHub</span>
                    </div>
                    <div class="bg-slate-950/80 border border-slate-800/80 rounded-xl p-1.5 flex items-center gap-1.5 shadow-inner">
                        <div class="w-5 h-5 rounded-full bg-white flex items-center justify-center text-[10px] font-bold text-gray-900 shadow-sm">N</div>
                        <span class="text-[9px] font-bold text-gray-300 truncate">Notion</span>
                    </div>
                </div>

                <!-- Metallic Vault Dial / Lock Wheel -->
                <div class="absolute right-3 w-20 h-20 rounded-full bg-gradient-to-r from-slate-750 to-slate-850 border-4 border-slate-700 flex items-center justify-center shadow-2xl transform group-hover:rotate-90 transition-transform duration-1000 ease-out z-10">
                    <div class="w-12 h-12 rounded-full border-2 border-dashed border-slate-500 flex items-center justify-center">
                        <div class="w-7 h-7 rounded-full bg-slate-950 border border-slate-600 flex items-center justify-center text-slate-400 font-black text-[9px]">
                            KEY
                        </div>
                    </div>
                    <!-- Indicator pin -->
                    <div class="absolute top-1 w-1.5 h-3 bg-brandPurple rounded-full shadow-md"></div>
                </div>
            </div>
        </div>

        <!-- Card 5: Biometric Scan (Col-span-1) -->
        <div x-data="{ 
            state: 'idle', 
            timer: null,
            startScan() {
                this.state = 'scanning';
                this.timer = setTimeout(() => {
                    this.state = 'success';
                }, 1200);
            },
            resetScan() {
                clearTimeout(this.timer);
                if (this.state === 'scanning') {
                    this.state = 'idle';
                }
            }
        }" class="bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm flex flex-col gap-4 relative overflow-hidden group">
            
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span>👤</span> Biometric Scan
            </h3>
            <p class="text-gray-600 text-sm leading-relaxed">
                Your fingerprint is your master password. Place and hold your finger to unlock.
            </p>
            
            <div class="flex justify-center items-center py-4 relative z-10">
                <div class="relative flex items-center justify-center">
                    <!-- Neon gradient ring -->
                    <div class="absolute w-24 h-24 rounded-full blur-md opacity-60 animate-pulse transition-all duration-300"
                         :class="{
                             'bg-gradient-to-tr from-purple-500 via-pink-400 to-cyan-400': state === 'idle',
                             'bg-gradient-to-tr from-yellow-400 via-orange-500 to-red-400 scale-110': state === 'scanning',
                             'bg-gradient-to-tr from-emerald-400 via-teal-500 to-green-300 scale-105': state === 'success'
                         }"></div>
                    <div class="absolute w-20 h-20 rounded-full border-4 opacity-40 transition-colors duration-300"
                         :class="{
                             'border-purple-400': state === 'idle',
                             'border-yellow-400': state === 'scanning',
                             'border-emerald-400': state === 'success'
                         }"></div>
                         
                    <!-- Touchpad sensor background -->
                    <button @mousedown="startScan()" 
                            @mouseup="resetScan()" 
                            @mouseleave="resetScan()"
                            @touchstart="startScan()" 
                            @touchend="resetScan()"
                            class="relative z-10 w-16 h-16 bg-slate-900 rounded-full flex items-center justify-center shadow-lg border-2 border-slate-800 active:scale-95 transition-all duration-200 cursor-pointer outline-none select-none">
                        
                        <!-- Fingerprint SVG -->
                        <svg class="w-8 h-8 transition-colors duration-300" 
                             :class="{
                                 'text-brandPurple': state === 'idle',
                                 'text-yellow-400 animate-pulse': state === 'scanning',
                                 'text-emerald-400': state === 'success'
                             }"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 11c0-1.1.9-2 2-2s2 .9 2 2v1"/>
                            <path d="M7 11c0-2.76 2.24-5 5-5a5 5 0 0 1 5 5"/>
                            <path d="M5 11c0-3.87 3.13-7 7-7s7 3.13 7 7"/>
                            <path d="M12 14c0 1.1-.9 2-2 2"/>
                            <path d="M14 15.5c.88-.5 1.5-1.43 1.5-2.5"/>
                            <path d="M12 17c0 1.1-.9 2-2 2s-2-.9-2-2v-3"/>
                            <path d="M16 17c0 2.76-2.24 5-5 5"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="text-center text-xs font-extrabold transition-colors duration-300 min-h-[16px] mt-auto uppercase tracking-wide"
                 :class="{
                     'text-brandPurple': state === 'idle',
                     'text-yellow-600': state === 'scanning',
                     'text-emerald-600': state === 'success'
                 }">
                <span x-show="state === 'idle'">Hold Sensor to scan</span>
                <span x-show="state === 'scanning'" class="inline-flex items-center gap-1">
                    <svg class="animate-spin h-3 w-3" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg> Scanning...
                </span>
                <span x-show="state === 'success'">✓ Authenticated!</span>
            </div>
        </div>

    </div>
</div>