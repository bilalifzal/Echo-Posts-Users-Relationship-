<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes | Creator Payouts</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body class="bg-[#0B1120] text-slate-300 antialiased font-sans flex min-h-screen selection:bg-emerald-500/30">

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
                <span class="bg-slate-800 text-slate-300 group-hover:bg-blue-600 group-hover:text-white px-2 py-0.5 rounded-full text-[10px]">{{ \App\Models\User::count() }}</span>
            </a>
            <a href="{{ route('admin.posts') }}" class="flex items-center justify-between px-4 py-2.5 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl font-bold transition-all group">
                <div class="flex items-center space-x-3"><span>📝</span> <span>Global Post Feed</span></div>
                <span class="bg-slate-800 text-slate-300 group-hover:bg-blue-600 group-hover:text-white px-2 py-0.5 rounded-full text-[10px]">{{ \App\Models\Post::count() }}</span>
            </a>
            <a href="{{ route('admin.reports') }}" class="flex items-center justify-between px-4 py-2.5 text-slate-400 hover:bg-red-500/10 hover:text-red-400 rounded-xl font-bold transition-all">
                <div class="flex items-center space-x-3"><span>⚠️</span> <span>Reported Content</span></div>
                <span class="bg-red-500/20 text-red-400 px-2 py-0.5 rounded text-[10px] font-black">3</span>
            </a>

            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 mt-6 px-4">Enterprise & Revenue</p>
            <a href="{{ route('admin.subscriptions') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl font-bold transition-all">
                <span>💳</span> <span>Stripe Subscriptions</span>
            </a>

            <a href="{{ route('admin.payouts') }}" class="flex items-center justify-between px-4 py-3 bg-emerald-600/10 text-emerald-400 rounded-xl font-bold border border-emerald-500/20 group">
                <div class="flex items-center space-x-3"><span>💸</span> <span>Creator Payouts</span></div>
                <div class="flex items-center space-x-2">
                    <span class="text-[10px] font-black">Due</span>
                    <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                </div>
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
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-emerald-600/5 rounded-full blur-[150px] pointer-events-none z-0"></div>

        <header class="px-8 py-5 border-b border-slate-800/50 bg-slate-900/80 backdrop-blur-md sticky top-0 z-40 flex justify-between items-center fade-in">
            <div class="relative w-96">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">🔍</span>
                <input type="text" placeholder="Search accounts, payouts, or Connect IDs..." class="w-full bg-slate-950 border border-slate-800 text-slate-300 text-sm rounded-full pl-10 pr-4 py-2.5 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all">
            </div>

            <div class="flex items-center space-x-6">
                <div class="text-right hidden md:block">
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Platform Liquidity</p>
                    <p class="text-xs font-black text-emerald-400">$45,210.00 Available</p>
                </div>
                <div class="w-px h-6 bg-slate-800"></div>
                <button class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white text-xs font-black uppercase tracking-widest rounded-lg transition-colors border border-slate-700 shadow-sm">
                    Connect Dashboard ↗
                </button>
            </div>
        </header>

        <div class="p-8 z-10 flex-1 space-y-8 max-w-screen-2xl mx-auto w-full">
            
            <div class="fade-in flex justify-between items-end">
                <div>
                    <h2 class="text-3xl font-black text-white tracking-tight">Creator Payouts</h2>
                    <p class="text-slate-400 font-medium mt-1">Review outstanding balances and process Stripe Connect transfers.</p>
                </div>
                <button class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white text-sm font-black uppercase tracking-widest rounded-xl shadow-lg shadow-emerald-900/20 transition-all hover:-translate-y-0.5">
                    Process All Pending ($1,700.50)
                </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 fade-in">
                <div class="bg-gradient-to-br from-amber-900/40 to-slate-900 border border-amber-500/30 p-6 rounded-2xl shadow-xl relative overflow-hidden group">
                    <div class="absolute -right-4 -top-4 text-8xl opacity-5 group-hover:scale-110 transition-transform text-white">⏳</div>
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 bg-amber-500/20 text-amber-400 rounded-xl flex items-center justify-center text-lg z-10 relative">⏳</div>
                    </div>
                    <p class="text-3xl font-black text-white relative z-10">$1,700.50</p>
                    <p class="text-xs font-bold text-amber-300 uppercase tracking-widest mt-1 relative z-10">Total Pending Payouts</p>
                </div>

                <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl shadow-xl relative overflow-hidden group">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 bg-emerald-500/10 text-emerald-400 rounded-xl flex items-center justify-center text-lg">🏦</div>
                    </div>
                    <p class="text-3xl font-black text-white">$12,840.00</p>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Processed This Month</p>
                </div>

                <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl shadow-xl relative overflow-hidden group">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 bg-blue-500/10 text-blue-400 rounded-xl flex items-center justify-center text-lg">🔗</div>
                    </div>
                    <p class="text-3xl font-black text-white">412</p>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Active Connect Accounts</p>
                </div>
            </div>

            <div class="bg-slate-900 border border-slate-800 rounded-3xl shadow-xl overflow-hidden fade-in flex flex-col relative mt-8">
                <div class="px-8 py-6 border-b border-slate-800 flex justify-between items-center bg-slate-900/50">
                    <h3 class="text-sm font-black text-white uppercase tracking-widest">Payout Queue</h3>
                    <div class="flex space-x-2">
                        <span class="px-3 py-1 bg-slate-800 text-slate-400 rounded text-xs font-bold">Auto-Payouts: Enabled (Next Run: 48h)</span>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-950/80 text-[10px] font-black text-slate-500 uppercase tracking-widest border-b border-slate-800/50">
                                <th class="px-8 py-5">Creator & Account</th>
                                <th class="px-8 py-5">Amount Due</th>
                                <th class="px-8 py-5">Status</th>
                                <th class="px-8 py-5">Scheduled For</th>
                                <th class="px-8 py-5 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-medium text-slate-300 divide-y divide-slate-800/50">
                            @foreach($payouts as $payout)
                            <tr class="hover:bg-slate-800/50 transition-colors group">
                                
                                <td class="px-8 py-5">
                                    <span class="font-bold text-white block">{{ $payout->creator }}</span>
                                    <span class="text-[10px] text-slate-500 font-mono tracking-widest">{{ $payout->connect_id }}</span>
                                </td>

                                <td class="px-8 py-5">
                                    <span class="font-black text-white text-lg">${{ number_format($payout->amount, 2) }}</span>
                                </td>

                                <td class="px-8 py-5">
                                    @if($payout->status === 'paid')
                                        <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-full text-[10px] font-black uppercase tracking-widest">Paid Out</span>
                                    @elseif($payout->status === 'processing')
                                        <span class="px-3 py-1 bg-blue-500/10 text-blue-400 border border-blue-500/20 rounded-full text-[10px] font-black uppercase tracking-widest flex items-center w-max space-x-2">
                                            <span class="w-1.5 h-1.5 bg-blue-400 rounded-full animate-ping"></span>
                                            <span>Processing (Bank Transit)</span>
                                        </span>
                                    @else
                                        <span class="px-3 py-1 bg-amber-500/10 text-amber-500 border border-amber-500/20 rounded-full text-[10px] font-black uppercase tracking-widest">Pending</span>
                                    @endif
                                </td>

                                <td class="px-8 py-5 text-slate-400">
                                    {{ $payout->due_date->format('M d, Y') }}
                                </td>

                                <td class="px-8 py-5 text-right">
                                    @if($payout->status === 'pending')
                                        <button class="px-4 py-1.5 bg-emerald-500/10 hover:bg-emerald-500/20 text-emerald-400 border border-emerald-500/20 rounded-lg text-xs font-bold transition-colors">
                                            Push Payment Now
                                        </button>
                                    @else
                                        <button class="px-4 py-1.5 bg-slate-800 text-slate-400 rounded-lg text-xs font-bold border border-slate-700" disabled>
                                            View Receipt
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            gsap.registerPlugin(ScrollTrigger);
            gsap.from(".sidebar-anim", { x: -50, opacity: 0, duration: 0.8, ease: "power3.out" });
            gsap.from(".fade-in", { y: 20, opacity: 0, duration: 0.8, stagger: 0.1, delay: 0.1, ease: "power3.out" });
        });
    </script>
</body>
</html>