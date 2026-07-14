<div class="overflow-hidden py-12">
    <!-- Header Section -->
    <div class="text-center mb-16">
        <h2 class="text-4xl font-extrabold text-gray-900 leading-tight">
            Real Talk <span class="text-transparent bg-clip-text bg-gradient-to-r from-brandPurple to-indigo-600">💬</span> from Real Users
        </h2>
        <p class="text-gray-500 mt-3 max-w-xl mx-auto">
            Hear why developers, designers, and security researchers trust KeyGuard with their daily digital life.
        </p>
    </div>

    <!-- Alpine.js Auto-scroll Testimonials Grid -->
    <div class="flex flex-col gap-8 w-full overflow-hidden relative" 
         x-data="{ 
            initMarquee(el, speed, direction) {
                let paused = false;
                el.addEventListener('mouseenter', () => paused = true);
                el.addEventListener('mouseleave', () => paused = false);
                
                // Duplicate elements to ensure seamless continuous scroll
                el.innerHTML += el.innerHTML;
                const halfWidth = el.scrollWidth / 2;
                let scrollVal = direction === 'left' ? 0 : halfWidth;
                
                const step = () => {
                    if (!paused) {
                        if (direction === 'left') {
                            scrollVal += speed;
                            if (scrollVal >= halfWidth) {
                                scrollVal = 0;
                            }
                        } else {
                            scrollVal -= speed;
                            if (scrollVal <= 0) {
                                scrollVal = halfWidth;
                            }
                        }
                        el.style.transform = `translateX(${-scrollVal}px)`;
                    }
                    requestAnimationFrame(step);
                };
                requestAnimationFrame(step);
            }
         }">

        <!-- Left and Right Fading Overlays for premium slider look -->
        <div class="absolute inset-y-0 left-0 w-16 md:w-32 bg-gradient-to-r from-[#F3F4F6] to-transparent pointer-events-none z-20"></div>
        <div class="absolute inset-y-0 right-0 w-16 md:w-32 bg-gradient-to-l from-[#F3F4F6] to-transparent pointer-events-none z-20"></div>

        <!-- Row 1: Moves Left -->
        <div class="w-full overflow-hidden relative py-2">
            <div class="flex gap-6 whitespace-nowrap w-max" 
                 x-init="initMarquee($el, 0.6, 'left')">
                
                <!-- Card 1 -->
                <div class="inline-block bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm min-w-[320px] md:min-w-[360px] max-w-[360px] hover:border-brandPurple/30 transition-all duration-300 hover:shadow-md cursor-pointer select-none">
                    <div class="flex items-center gap-3.5 mb-3">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Sarah Jenkins" class="w-10 h-10 rounded-full object-cover border border-purple-100">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Sarah Jenkins</h4>
                            <p class="text-xs text-brandPurple font-semibold">@sarah_dev</p>
                        </div>
                    </div>
                    <p class="text-gray-650 text-sm whitespace-normal leading-relaxed">
                        KeyGuard transformed how our development team handles secrets. Zero vault friction. Absolutely flawless!
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="inline-block bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm min-w-[320px] md:min-w-[360px] max-w-[360px] hover:border-brandPurple/30 transition-all duration-300 hover:shadow-md cursor-pointer select-none">
                    <div class="flex items-center gap-3.5 mb-3">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80" alt="Alex Rivera" class="w-10 h-10 rounded-full object-cover border border-purple-100">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Alex Rivera</h4>
                            <p class="text-xs text-brandPurple font-semibold">@arivera</p>
                        </div>
                    </div>
                    <p class="text-gray-650 text-sm whitespace-normal leading-relaxed">
                        The biometric touch ID feature is insanely fast. KeyGuard has completely solved my password panic.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="inline-block bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm min-w-[320px] md:min-w-[360px] max-w-[360px] hover:border-brandPurple/30 transition-all duration-300 hover:shadow-md cursor-pointer select-none">
                    <div class="flex items-center gap-3.5 mb-3">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=100&q=80" alt="Emily Chen" class="w-10 h-10 rounded-full object-cover border border-purple-100">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Emily Chen</h4>
                            <p class="text-xs text-brandPurple font-semibold">@emily_c</p>
                        </div>
                    </div>
                    <p class="text-gray-650 text-sm whitespace-normal leading-relaxed">
                        Loving the Dark Web Radar. Felt reassured knowing none of my personal emails leaked in the recent breaches.
                    </p>
                </div>

                <!-- Card 4 -->
                <div class="inline-block bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm min-w-[320px] md:min-w-[360px] max-w-[360px] hover:border-brandPurple/30 transition-all duration-300 hover:shadow-md cursor-pointer select-none">
                    <div class="flex items-center gap-3.5 mb-3">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=100&q=80" alt="Liam O'Connor" class="w-10 h-10 rounded-full object-cover border border-purple-100">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Liam O'Connor</h4>
                            <p class="text-xs text-brandPurple font-semibold">@liam_oc</p>
                        </div>
                    </div>
                    <p class="text-gray-650 text-sm whitespace-normal leading-relaxed">
                        It's so clean, so fast. The browser extension autofills everything instantly. No more copy-pasting code!
                    </p>
                </div>

                <!-- Card 5 -->
                <div class="inline-block bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm min-w-[320px] md:min-w-[360px] max-w-[360px] hover:border-brandPurple/30 transition-all duration-300 hover:shadow-md cursor-pointer select-none">
                    <div class="flex items-center gap-3.5 mb-3">
                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=100&q=80" alt="Jessica Wong" class="w-10 h-10 rounded-full object-cover border border-purple-100">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Jessica Wong</h4>
                            <p class="text-xs text-brandPurple font-semibold">@jess_w</p>
                        </div>
                    </div>
                    <p class="text-gray-650 text-sm whitespace-normal leading-relaxed">
                        Sharing specific credentials securely with my remote team members has never been this smooth.
                    </p>
                </div>

            </div>
        </div>

        <!-- Row 2: Moves Right -->
        <div class="w-full overflow-hidden relative py-2">
            <div class="flex gap-6 whitespace-nowrap w-max" 
                 x-init="initMarquee($el, 0.5, 'right')">
                
                <!-- Card 6 -->
                <div class="inline-block bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm min-w-[320px] md:min-w-[360px] max-w-[360px] hover:border-brandPurple/30 transition-all duration-300 hover:shadow-md cursor-pointer select-none">
                    <div class="flex items-center gap-3.5 mb-3">
                        <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=100&q=80" alt="Marcus Brody" class="w-10 h-10 rounded-full object-cover border border-purple-100">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Marcus Brody</h4>
                            <p class="text-xs text-brandPurple font-semibold">@marcusb</p>
                        </div>
                    </div>
                    <p class="text-gray-650 text-sm whitespace-normal leading-relaxed">
                        Finally, a password manager built for the modern era. Clean, robust, fast, and gorgeous interface.
                    </p>
                </div>

                <!-- Card 7 -->
                <div class="inline-block bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm min-w-[320px] md:min-w-[360px] max-w-[360px] hover:border-brandPurple/30 transition-all duration-300 hover:shadow-md cursor-pointer select-none">
                    <div class="flex items-center gap-3.5 mb-3">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=100&q=80" alt="Lisa Vance" class="w-10 h-10 rounded-full object-cover border border-purple-100">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Lisa Vance</h4>
                            <p class="text-xs text-brandPurple font-semibold">@lisa_v</p>
                        </div>
                    </div>
                    <p class="text-gray-650 text-sm whitespace-normal leading-relaxed">
                        AES-256 wrapping gives me absolute peace of mind. Visual design is next-level compared to outdated options.
                    </p>
                </div>

                <!-- Card 8 -->
                <div class="inline-block bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm min-w-[320px] md:min-w-[360px] max-w-[360px] hover:border-brandPurple/30 transition-all duration-300 hover:shadow-md cursor-pointer select-none">
                    <div class="flex items-center gap-3.5 mb-3">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=100&q=80" alt="Derrick Carter" class="w-10 h-10 rounded-full object-cover border border-purple-100">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Derrick Carter</h4>
                            <p class="text-xs text-brandPurple font-semibold">@d_carter</p>
                        </div>
                    </div>
                    <p class="text-gray-650 text-sm whitespace-normal leading-relaxed">
                        Syncing across my iPad, Android phone, and macOS desktop is lightning fast. Real-time updates just work.
                    </p>
                </div>

                <!-- Card 9 -->
                <div class="inline-block bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm min-w-[320px] md:min-w-[360px] max-w-[360px] hover:border-brandPurple/30 transition-all duration-300 hover:shadow-md cursor-pointer select-none">
                    <div class="flex items-center gap-3.5 mb-3">
                        <img src="https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?auto=format&fit=crop&w=100&q=80" alt="Sofia Alvarez" class="w-10 h-10 rounded-full object-cover border border-purple-100">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Sofia Alvarez</h4>
                            <p class="text-xs text-brandPurple font-semibold">@sofia_alv</p>
                        </div>
                    </div>
                    <p class="text-gray-650 text-sm whitespace-normal leading-relaxed">
                        KeyGuard's vault health dashboard caught 12 vulnerable duplicate passwords I had set years ago.
                    </p>
                </div>

                <!-- Card 10 -->
                <div class="inline-block bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm min-w-[320px] md:min-w-[360px] max-w-[360px] hover:border-brandPurple/30 transition-all duration-300 hover:shadow-md cursor-pointer select-none">
                    <div class="flex items-center gap-3.5 mb-3">
                        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=100&q=80" alt="Tyler Vance" class="w-10 h-10 rounded-full object-cover border border-purple-100">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Tyler Vance</h4>
                            <p class="text-xs text-brandPurple font-semibold">@tyler_v</p>
                        </div>
                    </div>
                    <p class="text-gray-650 text-sm whitespace-normal leading-relaxed">
                        I've tried almost every security tool out there. KeyGuard is by far the most developer-friendly tool.
                    </p>
                </div>

            </div>
        </div>

        <!-- Row 3: Moves Left -->
        <div class="w-full overflow-hidden relative py-2">
            <div class="flex gap-6 whitespace-nowrap w-max" 
                 x-init="initMarquee($el, 0.7, 'left')">
                
                <!-- Card 11 -->
                <div class="inline-block bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm min-w-[320px] md:min-w-[360px] max-w-[360px] hover:border-brandPurple/30 transition-all duration-300 hover:shadow-md cursor-pointer select-none">
                    <div class="flex items-center gap-3.5 mb-3">
                        <img src="https://images.unsplash.com/photo-1554151228-14d9def656e4?auto=format&fit=crop&w=100&q=80" alt="Nina Rossi" class="w-10 h-10 rounded-full object-cover border border-purple-100">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Nina Rossi</h4>
                            <p class="text-xs text-brandPurple font-semibold">@ninarossi</p>
                        </div>
                    </div>
                    <p class="text-gray-650 text-sm whitespace-normal leading-relaxed">
                        The bento grid UI for managing settings and auth is gorgeous. Huge kudos to the KeyGuard design team!
                    </p>
                </div>

                <!-- Card 12 -->
                <div class="inline-block bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm min-w-[320px] md:min-w-[360px] max-w-[360px] hover:border-brandPurple/30 transition-all duration-300 hover:shadow-md cursor-pointer select-none">
                    <div class="flex items-center gap-3.5 mb-3">
                        <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?auto=format&fit=crop&w=100&q=80" alt="Kenji Sato" class="w-10 h-10 rounded-full object-cover border border-purple-100">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Kenji Sato</h4>
                            <p class="text-xs text-brandPurple font-semibold">@kenjisato</p>
                        </div>
                    </div>
                    <p class="text-gray-650 text-sm whitespace-normal leading-relaxed">
                        Highly recommended. A clean, simple, must-have utility for anyone serious about privacy.
                    </p>
                </div>

                <!-- Card 13 -->
                <div class="inline-block bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm min-w-[320px] md:min-w-[360px] max-w-[360px] hover:border-brandPurple/30 transition-all duration-300 hover:shadow-md cursor-pointer select-none">
                    <div class="flex items-center gap-3.5 mb-3">
                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=100&q=80" alt="Chloe Miller" class="w-10 h-10 rounded-full object-cover border border-purple-100">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Chloe Miller</h4>
                            <p class="text-xs text-brandPurple font-semibold">@chloem</p>
                        </div>
                    </div>
                    <p class="text-gray-650 text-sm whitespace-normal leading-relaxed">
                        Best customer support in the game. Real human experts helped me import my old data instantly.
                    </p>
                </div>

                <!-- Card 14 -->
                <div class="inline-block bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm min-w-[320px] md:min-w-[360px] max-w-[360px] hover:border-brandPurple/30 transition-all duration-300 hover:shadow-md cursor-pointer select-none">
                    <div class="flex items-center gap-3.5 mb-3">
                        <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=100&q=80" alt="David Kim" class="w-10 h-10 rounded-full object-cover border border-purple-100">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">David Kim</h4>
                            <p class="text-xs text-brandPurple font-semibold">@dkim_sec</p>
                        </div>
                    </div>
                    <p class="text-gray-650 text-sm whitespace-normal leading-relaxed">
                        The zero-knowledge architecture is executed perfectly. I checked their open-source audits—completely solid.
                    </p>
                </div>

                <!-- Card 15 -->
                <div class="inline-block bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-6 shadow-sm min-w-[320px] md:min-w-[360px] max-w-[360px] hover:border-brandPurple/30 transition-all duration-300 hover:shadow-md cursor-pointer select-none">
                    <div class="flex items-center gap-3.5 mb-3">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=100&q=80" alt="Maya Patel" class="w-10 h-10 rounded-full object-cover border border-purple-100">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Maya Patel</h4>
                            <p class="text-xs text-brandPurple font-semibold">@maya_p</p>
                        </div>
                    </div>
                    <p class="text-gray-650 text-sm whitespace-normal leading-relaxed">
                        I set up my whole family in less than 5 minutes. Extremely intuitive, even my grandpa uses it daily!
                    </p>
                </div>

            </div>
        </div>

    </div>
</div>