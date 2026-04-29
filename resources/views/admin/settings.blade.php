<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes | Platform Configuration</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <style>
        /* Custom Toggle Switch Animation */
        .toggle-checkbox:checked { right: 0; border-color: #a855f7; }
        .toggle-checkbox:checked + .toggle-label { background-color: #a855f7; box-shadow: 0 0 15px rgba(168, 85, 247, 0.5); }
        
        /* Ultra-Premium Glass Effect */
        .glass-card { 
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.6) 0%, rgba(15, 23, 42, 0.4) 100%);
            backdrop-filter: blur(24px); 
            -webkit-backdrop-filter: blur(24px); 
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), inset 0 1px 1px rgba(255, 255, 255, 0.05);
        }
        
        /* Danger Zone Stripes */
        .bg-stripes-red {
            background-image: repeating-linear-gradient(45deg, rgba(220, 38, 38, 0.05) 0px, rgba(220, 38, 38, 0.05) 10px, transparent 10px, transparent 20px);
        }
        
        /* Grid Overlay */
        .bg-grid-pattern {
            background-image: radial-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 30px 30px;
        }
    </style>
</head>
<body class="bg-[#0B1120] text-slate-300 antialiased font-sans flex min-h-screen selection:bg-purple-500/30">

    <aside class="w-[280px] bg-slate-900 border-r border-slate-800 flex flex-col h-screen sticky top-0 z-50 shadow-2xl sidebar-anim shrink-0">
        <div class="p-6 flex items-center space-x-3 border-b border-slate-800">
            <div class="w-10 h-10 bg-gradient-to-tr from-red-600 to-pink-500 rounded-xl flex items-center justify-center text-white font-black text-xl shadow-lg shadow-red-500/30">⚡</div>
            <div>
                <h1 class="text-xl font-black text-white tracking-widest">ECHOES</h1>
                <p class="text-[10px] text-red-400 font-bold uppercase tracking-widest">God Mode</p>
            </div>
        </div>

        <nav class="flex-1 p-4 space-y-1 overflow-y-auto scrollbar-hide">
            
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 mt-2 px-4">Core Overview</p>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl font-bold transition-all group">
                <span>📊</span> <span>Live Dashboard</span>
            </a>

            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 mt-6 px-4">Network Management</p>
            <a href="{{ route('admin.users') }}" class="flex items-center justify-between px-4 py-2.5 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl font-bold transition-all group">
                <div class="flex items-center space-x-3"><span>👥</span> <span>All Creators</span></div>
                <span class="bg-slate-800 text-slate-300 group-hover:bg-blue-600 group-hover:text-white px-2 py-0.5 rounded-full text-[10px]">{{ \App\Models\User::count() ?? 0 }}</span>
            </a>
            <a href="{{ route('admin.posts') }}" class="flex items-center justify-between px-4 py-2.5 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl font-bold transition-all group">
                <div class="flex items-center space-x-3"><span>📝</span> <span>Global Post Feed</span></div>
                <span class="bg-slate-800 text-slate-300 group-hover:bg-blue-600 group-hover:text-white px-2 py-0.5 rounded-full text-[10px]">{{ \App\Models\Post::count() ?? 0 }}</span>
            </a>
            <a href="{{ route('admin.reports') }}" class="flex items-center justify-between px-4 py-2.5 text-slate-400 hover:bg-red-500/10 hover:text-red-400 rounded-xl font-bold transition-all">
                <div class="flex items-center space-x-3"><span>⚠️</span> <span>Reported Content</span></div>
                <span class="bg-red-500/20 text-red-400 px-2 py-0.5 rounded text-[10px] font-black">3</span>
            </a>

            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 mt-6 px-4">Enterprise & Revenue</p>
            <a href="{{ route('admin.subscriptions') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl font-bold transition-all">
                <span>💳</span> <span>Stripe Subscriptions</span>
            </a>
            <a href="{{ route('admin.payouts') }}" class="flex items-center justify-between px-4 py-2.5 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl font-bold transition-all group">
                <div class="flex items-center space-x-3"><span>💸</span> <span>Creator Payouts</span></div>
            </a>

            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 mt-6 px-4">System Settings</p>
            
            <a href="{{ route('admin.settings') }}" class="flex items-center justify-between px-4 py-3 bg-purple-600/10 text-purple-400 rounded-xl font-bold border border-purple-500/20 group shadow-inner">
                <div class="flex items-center space-x-3"><span>⚙️</span> <span>Platform Configuration</span></div>
                <div class="flex items-center space-x-2">
                    <span class="text-[10px] font-black">Core</span>
                    <div class="w-2 h-2 bg-purple-500 rounded-full animate-pulse"></div>
                </div>
            </a>

            <a href="{{ route('admin.backups') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl font-bold transition-all">
                <span>🗄️</span> <span>Database Backups</span>
            </a>
        </nav>

        <div class="p-6 border-t border-slate-800 bg-slate-900/50">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center text-white font-black border border-slate-700 shadow-inner">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div>
                    <p class="text-sm font-black text-white">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] font-bold text-red-400 uppercase tracking-widest flex items-center"><span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-1.5 animate-pulse"></span> Root Access</p>
                </div>
            </div>
            <a href="/" class="block w-full py-2.5 text-center text-xs font-bold text-slate-400 bg-slate-800 rounded-lg hover:bg-slate-700 hover:text-white transition-colors">Exit to Public Site</a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col min-h-screen relative min-w-0 bg-[#0B1120]">
        
        <div class="absolute inset-0 bg-grid-pattern opacity-30 pointer-events-none z-0"></div>
        <div class="orb-anim absolute top-1/4 left-1/4 w-[600px] h-[600px] bg-purple-600/10 rounded-full blur-[120px] pointer-events-none z-0"></div>
        <div class="orb-anim-2 absolute bottom-0 right-1/4 w-[700px] h-[700px] bg-blue-600/10 rounded-full blur-[150px] pointer-events-none z-0"></div>

        <header class="px-8 py-5 border-b border-slate-800/30 glass-card sticky top-0 z-40 flex justify-between items-center fade-in">
            <div class="relative w-96">
                <nav class="flex items-center text-sm font-bold text-slate-400 space-x-3">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-white transition-colors">God Mode</a>
                    <span class="text-slate-600">❯</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">Platform Configuration</span>
                </nav>
            </div>

            <div class="flex items-center space-x-6">
                <div class="px-4 py-1.5 bg-slate-900/80 border border-slate-700/50 text-slate-300 text-[10px] font-black uppercase tracking-widest rounded-full flex items-center space-x-2 shadow-inner">
                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse shadow-[0_0_8px_rgba(16,185,129,0.8)]"></span>
                    <span>System v2.4.0</span>
                </div>
                <button class="px-6 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white text-xs font-black uppercase tracking-widest rounded-lg transition-all shadow-[0_0_20px_rgba(168,85,247,0.3)] hover:shadow-[0_0_25px_rgba(168,85,247,0.5)] hover:-translate-y-0.5 border border-purple-500/50">
                    Save Changes
                </button>
            </div>
        </header>

        <div class="p-8 z-10 flex-1 space-y-10 max-w-screen-xl mx-auto w-full">
            
            <div class="fade-in">
                <h2 class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white via-purple-200 to-slate-400 tracking-tight pb-1">Platform Core</h2>
                <p class="text-slate-400 font-medium mt-2 text-lg">Manage global behavior, security parameters, and API integrations.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-8">
                    
                    <div class="glass-card rounded-3xl p-8 fade-up group">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-purple-500 opacity-50 group-hover:opacity-100 transition-opacity"></div>
                        
                        <h3 class="text-xl font-black text-white mb-8 flex items-center space-x-3">
                            <span class="w-8 h-8 rounded-lg bg-blue-500/20 text-blue-400 flex items-center justify-center text-sm border border-blue-500/30 shadow-[0_0_15px_rgba(59,130,246,0.2)]">01</span>
                            <span>General Variables</span>
                        </h3>
                        
                        <div class="space-y-6">
                            <div class="group/input">
                                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 group-focus-within/input:text-purple-400 transition-colors">Platform Name</label>
                                <input type="text" value="Echoes Network" class="w-full bg-slate-900/50 border border-slate-700/50 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 focus:bg-slate-900 focus:shadow-[0_0_15px_rgba(168,85,247,0.2)] transition-all font-medium">
                            </div>
                            <div class="group/input">
                                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 group-focus-within/input:text-purple-400 transition-colors">Global Meta Description</label>
                                <textarea rows="3" class="w-full bg-slate-900/50 border border-slate-700/50 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 focus:bg-slate-900 focus:shadow-[0_0_15px_rgba(168,85,247,0.2)] transition-all font-medium resize-none leading-relaxed">The premier network for masterpieces, creators, and enterprise content.</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="glass-card rounded-3xl p-8 fade-up group">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-purple-500 to-pink-500 opacity-50 group-hover:opacity-100 transition-opacity"></div>
                        
                        <h3 class="text-xl font-black text-white mb-8 flex items-center space-x-3">
                            <span class="w-8 h-8 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center text-sm border border-purple-500/30 shadow-[0_0_15px_rgba(168,85,247,0.2)]">02</span>
                            <span>Security & Access</span>
                        </h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-5 bg-slate-900/40 border border-slate-700/30 rounded-2xl hover:border-purple-500/50 hover:bg-slate-900/80 transition-all group/toggle">
                                <div>
                                    <h4 class="text-white font-bold text-base">Maintenance Mode</h4>
                                    <p class="text-xs text-slate-400 mt-1.5 group-hover/toggle:text-slate-300 transition-colors">Locks the public site and redirects non-admins to a maintenance screen.</p>
                                </div>
                                <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in shrink-0">
                                    <input type="checkbox" name="toggle" id="toggle1" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 border-slate-600 appearance-none cursor-pointer transition-transform duration-300 ease-in-out z-10"/>
                                    <label for="toggle1" class="toggle-label block overflow-hidden h-6 rounded-full bg-slate-800 cursor-pointer transition-colors duration-300 ease-in-out border border-slate-700/50"></label>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-5 bg-slate-900/40 border border-slate-700/30 rounded-2xl hover:border-purple-500/50 hover:bg-slate-900/80 transition-all group/toggle">
                                <div>
                                    <h4 class="text-white font-bold text-base">Open Public Registrations</h4>
                                    <p class="text-xs text-slate-400 mt-1.5 group-hover/toggle:text-slate-300 transition-colors">Allow new users to sign up and create creator profiles autonomously.</p>
                                </div>
                                <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in shrink-0">
                                    <input type="checkbox" name="toggle" id="toggle2" checked class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 border-slate-600 appearance-none cursor-pointer transition-transform duration-300 ease-in-out z-10 translate-x-6 border-purple-500"/>
                                    <label for="toggle2" class="toggle-label block overflow-hidden h-6 rounded-full bg-purple-500 cursor-pointer transition-colors duration-300 ease-in-out shadow-[0_0_15px_rgba(168,85,247,0.5)]"></label>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-5 bg-slate-900/40 border border-slate-700/30 rounded-2xl hover:border-purple-500/50 hover:bg-slate-900/80 transition-all group/toggle">
                                <div>
                                    <h4 class="text-white font-bold text-base">Auto-Approve Content</h4>
                                    <p class="text-xs text-slate-400 mt-1.5 group-hover/toggle:text-slate-300 transition-colors">Publish posts instantly without requiring God Mode manual review.</p>
                                </div>
                                <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in shrink-0">
                                    <input type="checkbox" name="toggle" id="toggle3" checked class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 border-slate-600 appearance-none cursor-pointer transition-transform duration-300 ease-in-out z-10 translate-x-6 border-purple-500"/>
                                    <label for="toggle3" class="toggle-label block overflow-hidden h-6 rounded-full bg-purple-500 cursor-pointer transition-colors duration-300 ease-in-out shadow-[0_0_15px_rgba(168,85,247,0.5)]"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="space-y-8">
                    
                    <div class="glass-card rounded-3xl p-8 fade-up">
                        <h3 class="text-sm font-black text-white uppercase tracking-widest mb-6 flex items-center space-x-2 pb-4 border-b border-slate-700/50">
                            <span class="text-emerald-400 text-lg drop-shadow-[0_0_8px_rgba(16,185,129,0.8)]">🔗</span> <span>API Keys (.env)</span>
                        </h3>
                        
                        <div class="space-y-5">
                            <div class="group/api">
                                <label class="flex justify-between items-center text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 group-focus-within/api:text-emerald-400 transition-colors">
                                    <span>Stripe Secret Key</span>
                                    <button class="text-slate-500 hover:text-white">👁️</button>
                                </label>
                                <input type="password" value="sk_live_1234567890abcdef" class="w-full bg-slate-900/80 border border-slate-700/50 text-emerald-400 rounded-xl px-4 py-2.5 text-sm font-mono focus:outline-none focus:border-emerald-500 focus:shadow-[0_0_15px_rgba(16,185,129,0.2)] transition-all">
                            </div>
                            <div class="group/api">
                                <label class="flex justify-between items-center text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 group-focus-within/api:text-emerald-400 transition-colors">
                                    <span>AWS S3 Bucket</span>
                                </label>
                                <input type="text" value="echoes-production-storage" class="w-full bg-slate-900/80 border border-slate-700/50 text-emerald-400 rounded-xl px-4 py-2.5 text-sm font-mono focus:outline-none focus:border-emerald-500 focus:shadow-[0_0_15px_rgba(16,185,129,0.2)] transition-all">
                            </div>
                        </div>
                    </div>

                    <div class="bg-red-950/20 bg-stripes-red border border-red-900/50 rounded-3xl p-8 shadow-2xl shadow-red-900/10 fade-up relative overflow-hidden group">
                        <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-red-600 to-orange-500 shadow-[0_0_20px_rgba(220,38,38,0.8)]"></div>
                        
                        <h3 class="text-sm font-black text-red-400 uppercase tracking-widest mb-3 flex items-center space-x-2">
                            <span class="text-lg animate-bounce">⚠️</span> <span class="drop-shadow-[0_0_8px_rgba(220,38,38,0.8)]">Danger Zone</span>
                        </h3>
                        <p class="text-xs text-red-200/60 mb-8 leading-relaxed">These actions affect the fundamental database architecture and cannot be undone. Proceed with extreme caution.</p>
                        
                        <div class="space-y-4">
                            <button class="w-full flex items-center justify-between p-4 bg-slate-950/80 border border-red-900/50 rounded-xl hover:bg-red-900/30 hover:border-red-500 transition-all group/btn shadow-inner">
                                <span class="text-sm font-bold text-slate-300 group-hover/btn:text-red-400">Purge Cache</span>
                                <span class="text-slate-600 group-hover/btn:text-red-400 transition-colors">♽</span>
                            </button>
                            <button class="w-full flex items-center justify-between p-4 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-xl shadow-[0_0_20px_rgba(220,38,38,0.3)] hover:shadow-[0_0_30px_rgba(220,38,38,0.6)] hover:-translate-y-0.5 transition-all border border-red-500">
                                <span class="text-sm font-black tracking-wide">Factory Reset Database</span>
                                <span class="text-white/70">💥</span>
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            gsap.registerPlugin(ScrollTrigger);
            
            // Sidebar and Header
            gsap.from(".sidebar-anim", { x: -50, opacity: 0, duration: 0.8, ease: "power3.out" });
            gsap.from(".fade-in", { y: -20, opacity: 0, duration: 0.8, stagger: 0.1, delay: 0.1, ease: "power3.out" });
            
            // Staggered Cards Entry
            gsap.from(".fade-up", { 
                y: 40, 
                opacity: 0, 
                duration: 0.8, 
                stagger: 0.15, 
                ease: "power3.out",
                delay: 0.3 
            });

            // Drifting Orbs Animation
            gsap.to(".orb-anim", {
                x: 50,
                y: 30,
                duration: 6,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut"
            });
            gsap.to(".orb-anim-2", {
                x: -60,
                y: -40,
                duration: 8,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut"
            });
            
            // Toggle Logic (Tailwind classes)
            document.querySelectorAll('.toggle-checkbox').forEach(toggle => {
                toggle.addEventListener('change', function() {
                    if(this.checked) {
                        this.classList.add('translate-x-6', 'border-purple-500');
                        this.classList.remove('border-slate-600');
                        this.nextElementSibling.classList.add('bg-purple-500', 'shadow-[0_0_15px_rgba(168,85,247,0.5)]');
                        this.nextElementSibling.classList.remove('bg-slate-800');
                    } else {
                        this.classList.remove('translate-x-6', 'border-purple-500');
                        this.classList.add('border-slate-600');
                        this.nextElementSibling.classList.remove('bg-purple-500', 'shadow-[0_0_15px_rgba(168,85,247,0.5)]');
                        this.nextElementSibling.classList.add('bg-slate-800');
                    }
                });
            });
        });
    </script>
</body>
</html>