<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes | Super Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body class="bg-[#0B1120] text-slate-300 antialiased font-sans flex min-h-screen selection:bg-blue-500/30">

    <aside class="w-[280px] bg-slate-900 border-r border-slate-800 flex flex-col h-screen sticky top-0 z-50 shadow-2xl sidebar-anim shrink-0">
        <div class="p-6 flex items-center space-x-3 border-b border-slate-800">
            <div class="w-10 h-10 bg-gradient-to-tr from-red-600 to-pink-500 rounded-xl flex items-center justify-center text-white font-black text-xl shadow-lg shadow-red-500/30">⚡</div>
            <div>
                <h1 class="text-xl font-black text-white tracking-widest">ECHOES</h1>
                <p class="text-[10px] text-red-400 font-bold uppercase tracking-widest">God Mode</p>
            </div>
        </div>

        <nav class="flex-1 p-4 space-y-1 se">
            
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 mt-2 px-4">Core Overview</p>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center justify-between px-4 py-3 bg-blue-600/10 text-blue-400 rounded-xl font-bold border border-blue-500/20 group">
                <div class="flex items-center space-x-3"><span>📊</span> <span>Live Dashboard</span></div>
                <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
            </a>

            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 mt-6 px-4">Network Management</p>
            <a href="{{ route('admin.users') }}" class="flex items-center justify-between px-4 py-2.5 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl font-bold transition-all group">
                <div class="flex items-center space-x-3"><span>👥</span> <span>All Creators</span></div>
                <span class="bg-slate-800 text-slate-300 group-hover:bg-blue-600 group-hover:text-white px-2 py-0.5 rounded-full text-[10px]">{{ number_format($totalUsers) }}</span>
            </a>
            <a href="{{ route('admin.posts') }}" class="flex items-center justify-between px-4 py-2.5 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl font-bold transition-all group">
                <div class="flex items-center space-x-3"><span>📝</span> <span>Global Post Feed</span></div>
                <span class="bg-slate-800 text-slate-300 group-hover:bg-blue-600 group-hover:text-white px-2 py-0.5 rounded-full text-[10px]">{{ number_format($totalPosts) }}</span>
            </a>
            <a href="{{ route('admin.reports') }}" class="flex items-center justify-between px-4 py-2.5 text-slate-400 hover:bg-red-500/10 hover:text-red-400 rounded-xl font-bold transition-all">
                <div class="flex items-center space-x-3"><span>⚠️</span> <span>Reported Content</span></div>
                <span class="bg-red-500/20 text-red-400 px-2 py-0.5 rounded text-[10px] font-black">3</span>
            </a>

            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 mt-6 px-4">Enterprise & Revenue</p>
            <a href="{{ route('admin.subscriptions') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl font-bold transition-all">
                <span>💳</span> <span>Stripe Subscriptions</span>
            </a>
            <a href="{{ route('admin.payouts') }}" class="flex items-center justify-between px-4 py-2.5 text-slate-400 hover:bg-emerald-500/10 hover:text-emerald-400 rounded-xl font-bold transition-all">
                <div class="flex items-center space-x-3"><span>💸</span> <span>Creator Payouts</span></div>
                <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
            </a>

            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 mt-6 px-4">System Settings</p>
            <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl font-bold transition-all">
                <span>⚙️</span> <span>Platform Configuration</span>
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

    <main class="flex-1 flex flex-col min-h-screen relative min-w-0">
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-blue-600/5 rounded-full blur-[150px] pointer-events-none z-0"></div>

        <header class="px-8 py-5 border-b border-slate-800/50 bg-slate-900/80 backdrop-blur-md sticky top-0 z-40 flex justify-between items-center fade-in">
            <div class="relative w-96">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">🔍</span>
                <input type="text" placeholder="Search users, posts, or transactions..." class="w-full bg-slate-950 border border-slate-800 text-slate-300 text-sm rounded-full pl-10 pr-4 py-2.5 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                <div class="absolute right-3 top-1/2 -translate-y-1/2 flex space-x-1">
                    <kbd class="px-1.5 py-0.5 bg-slate-800 text-slate-400 rounded text-[10px] font-mono border border-slate-700">Ctrl</kbd>
                    <kbd class="px-1.5 py-0.5 bg-slate-800 text-slate-400 rounded text-[10px] font-mono border border-slate-700">K</kbd>
                </div>
            </div>

            <div class="flex items-center space-x-6">
                <button class="text-slate-400 hover:text-white relative">
                    <span>🔔</span>
                    <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 border-2 border-[#0B1120] rounded-full"></span>
                </button>
                <div class="w-px h-6 bg-slate-800"></div>
                <div class="flex items-center space-x-4">
                    <div class="text-right hidden md:block">
                        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Database</p>
                        <p class="text-xs font-black text-emerald-400">Stable (14.2 MB)</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white text-xs font-black uppercase tracking-widest rounded-lg transition-colors shadow-lg shadow-blue-500/20">
                        Clear Cache
                    </button>
                </div>
            </div>
        </header>

        <div class="p-8 z-10 flex-1 space-y-8 max-w-screen-2xl mx-auto w-full">
            
            <div class="fade-in">
                <h2 class="text-3xl font-black text-white tracking-tight">System Overview</h2>
                <p class="text-slate-400 font-medium mt-1">Live metrics across the Echoes network.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 fade-in">
                <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl shadow-xl relative overflow-hidden group">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 bg-blue-500/10 text-blue-400 rounded-xl flex items-center justify-center text-lg">👥</div>
                        <span class="text-xs font-black text-emerald-400 bg-emerald-400/10 px-2 py-1 rounded-full">+12%</span>
                    </div>
                    <p class="text-3xl font-black text-white">{{ number_format($totalUsers) }}</p>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Total Creators</p>
                </div>
                
                <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl shadow-xl relative overflow-hidden group">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 bg-pink-500/10 text-pink-400 rounded-xl flex items-center justify-center text-lg">📝</div>
                        <span class="text-xs font-black text-emerald-400 bg-emerald-400/10 px-2 py-1 rounded-full">+8%</span>
                    </div>
                    <p class="text-3xl font-black text-white">{{ number_format($totalPosts) }}</p>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Masterpieces Published</p>
                </div>

                <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl shadow-xl relative overflow-hidden group">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 bg-teal-500/10 text-teal-400 rounded-xl flex items-center justify-center text-lg">⚡</div>
                        <span class="text-xs font-black text-emerald-400 bg-emerald-400/10 px-2 py-1 rounded-full">+24%</span>
                    </div>
                    <p class="text-3xl font-black text-white">{{ number_format($totalEngagements) }}</p>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Network Interactions</p>
                </div>

                <div class="bg-gradient-to-br from-indigo-900 to-slate-900 border border-indigo-500/30 p-6 rounded-2xl shadow-xl relative overflow-hidden group">
                    <div class="absolute -right-4 -top-4 text-8xl opacity-5 group-hover:scale-110 transition-transform text-white">💰</div>
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 bg-indigo-500/20 text-indigo-300 rounded-xl flex items-center justify-center text-lg">💳</div>
                        <span class="text-xs font-black text-emerald-400 bg-emerald-400/10 px-2 py-1 rounded-full">+15%</span>
                    </div>
                    <p class="text-3xl font-black text-white">$12,450</p>
                    <p class="text-xs font-bold text-indigo-300 uppercase tracking-widest mt-1">MRR (Live)</p>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 scroll-anim">
                
                <div class="xl:col-span-2 bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl flex flex-col">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <h3 class="text-lg font-black text-white">Platform Growth</h3>
                            <p class="text-xs font-bold text-slate-500 uppercase tracking-widest">Traffic & Revenue (Last 7 Days)</p>
                        </div>
                        <select class="bg-slate-950 border border-slate-800 text-slate-300 text-xs font-bold px-3 py-1.5 rounded-lg focus:outline-none">
                            <option>Last 7 Days</option>
                            <option>Last 30 Days</option>
                            <option>This Year</option>
                        </select>
                    </div>
                    <div id="growthChart" class="flex-1 w-full min-h-[300px]"></div>
                </div>

                <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl flex flex-col">
                    <h3 class="text-sm font-black text-white uppercase tracking-widest mb-6 border-b border-slate-800 pb-4">Needs Attention</h3>
                    
                    <div class="space-y-4 flex-1">
                        <div class="p-4 bg-red-950/20 border border-red-900/30 rounded-2xl flex items-start space-x-3">
                            <div class="mt-0.5 text-red-400">⚠️</div>
                            <div>
                                <p class="text-sm font-bold text-red-400">3 Posts Reported</p>
                                <p class="text-xs text-slate-400 mt-1 mb-3">Community flagged content for review.</p>
                                <button class="px-3 py-1.5 bg-red-500/10 hover:bg-red-500/20 text-red-400 text-xs font-bold rounded-lg transition-colors">Review Now</button>
                            </div>
                        </div>

                        <div class="p-4 bg-amber-950/20 border border-amber-900/30 rounded-2xl flex items-start space-x-3">
                            <div class="mt-0.5 text-amber-400">💸</div>
                            <div>
                                <p class="text-sm font-bold text-amber-400">Pending Payouts</p>
                                <p class="text-xs text-slate-400 mt-1 mb-3">$1,240 ready for creator distribution.</p>
                                <button class="px-3 py-1.5 bg-amber-500/10 hover:bg-amber-500/20 text-amber-400 text-xs font-bold rounded-lg transition-colors">Process Stripe API</button>
                            </div>
                        </div>
                        
                        <div class="p-4 bg-slate-950 border border-slate-800 rounded-2xl flex items-start space-x-3 group hover:border-blue-500/50 transition-colors cursor-pointer">
                            <div class="mt-0.5 text-blue-400">⭐</div>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-slate-300 group-hover:text-blue-400 transition-colors">Featured Masterpiece</p>
                                <p class="text-xs text-slate-500 mt-1">Currently assigned to: Post #42</p>
                            </div>
                            <button class="text-slate-500 group-hover:text-white">&rarr;</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Register ScrollTrigger
            gsap.registerPlugin(ScrollTrigger);

            // Initial load animations (Top area)
            gsap.from(".sidebar-anim", { x: -50, opacity: 0, duration: 0.8, ease: "power3.out" });
            gsap.from(".fade-in", { y: 20, opacity: 0, duration: 0.8, stagger: 0.1, delay: 0.1, ease: "power3.out" });

            // Scroll animations (Bottom area triggers when scrolled into view)
            gsap.utils.toArray('.scroll-anim').forEach(section => {
                gsap.from(section, {
                    scrollTrigger: { 
                        trigger: section, 
                        start: "top 85%", 
                        toggleActions: "play none none reverse" 
                    },
                    y: 30, opacity: 0, duration: 0.8, ease: "power3.out"
                });
            });

            // ApexCharts Initialization
            var options = {
                series: [{
                    name: 'Page Views',
                    data: [310, 420, 280, 510, 600, 850, 1050]
                }, {
                    name: 'Revenue ($)',
                    data: [110, 150, 95, 200, 250, 380, 520]
                }],
                chart: {
                    height: '100%',
                    type: 'area',
                    fontFamily: 'inherit',
                    toolbar: { show: false },
                    background: 'transparent'
                },
                colors: ['#3b82f6', '#10b981'], // Blue and Emerald
                dataLabels: { enabled: false },
                stroke: { curve: 'smooth', width: 2 },
                fill: {
                    type: 'gradient',
                    gradient: { shadeIntensity: 1, opacityFrom: 0.4, opacityTo: 0.05, stops: [0, 100] }
                },
                xaxis: {
                    categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    axisBorder: { show: false },
                    axisTicks: { show: false },
                    labels: { style: { colors: '#64748b' } }
                },
                yaxis: {
                    labels: { style: { colors: '#64748b' } }
                },
                grid: {
                    borderColor: '#1e293b',
                    strokeDashArray: 4,
                },
                theme: { mode: 'dark' },
                legend: { position: 'top', horizontalAlign: 'right' }
            };

            var chart = new ApexCharts(document.querySelector("#growthChart"), options);
            chart.render();
        });
    </script>
</body>
</html>