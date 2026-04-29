<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes | System Backups</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <style>
        .glass-card { 
            background: rgba(15, 23, 42, 0.5); 
            backdrop-filter: blur(20px); 
            border: 1px solid rgba(255, 255, 255, 0.05); 
        }
        .terminal-text { font-family: 'Courier New', Courier, monospace; }
    </style>
</head>
<body class="bg-[#0B1120] text-slate-300 antialiased font-sans flex min-h-screen selection:bg-cyan-500/30">

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
            <a href="{{ route('admin.payouts') }}" class="flex items-center justify-between px-4 py-2.5 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl font-bold transition-all">
                <div class="flex items-center space-x-3"><span>💸</span> <span>Creator Payouts</span></div>
            </a>

            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 mt-6 px-4">System Settings</p>
            <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl font-bold transition-all">
                <span>⚙️</span> <span>Platform Configuration</span>
            </a>

            <a href="{{ route('admin.backups') }}" class="flex items-center justify-between px-4 py-3 bg-cyan-600/10 text-cyan-400 rounded-xl font-bold border border-cyan-500/20 group">
                <div class="flex items-center space-x-3"><span>🗄️</span> <span>Database Backups</span></div>
                <div class="w-2 h-2 bg-cyan-500 rounded-full animate-pulse"></div>
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
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-cyan-600/5 rounded-full blur-[150px] pointer-events-none z-0"></div>

        <header class="px-8 py-5 border-b border-slate-800/50 bg-slate-900/80 backdrop-blur-md sticky top-0 z-40 flex justify-between items-center fade-in">
            <div class="flex items-center space-x-4">
                <h2 class="text-xl font-black text-white tracking-widest">DATA VAULT</h2>
                <span class="px-3 py-1 bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 text-[10px] font-black uppercase tracking-widest rounded-full">Encrypted</span>
            </div>

            <div class="flex items-center space-x-4">
                <button class="px-6 py-2 bg-cyan-600 hover:bg-cyan-500 text-white text-xs font-black uppercase tracking-widest rounded-lg transition-all shadow-lg shadow-cyan-500/20">
                    Run Manual Backup
                </button>
            </div>
        </header>

        <div class="p-8 z-10 flex-1 space-y-8 max-w-screen-2xl mx-auto w-full">
            
            <div class="fade-in">
                <h2 class="text-3xl font-black text-white tracking-tight">System Snapshots</h2>
                <p class="text-slate-400 font-medium mt-1">Automatic and manual redundancy points for the Echoes database.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 fade-in">
                <div class="glass-card p-6 rounded-2xl border-l-4 border-emerald-500">
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Last Backup Status</p>
                    <p class="text-2xl font-black text-emerald-400 mt-2">Successful</p>
                    <p class="text-xs text-slate-500 mt-1">Today at 10:42 PM</p>
                </div>
                <div class="glass-card p-6 rounded-2xl border-l-4 border-cyan-500">
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Total Backup Storage</p>
                    <p class="text-2xl font-black text-cyan-400 mt-2">412.50 MB</p>
                    <p class="text-xs text-slate-500 mt-1">S3 Bucket: echoes-vault</p>
                </div>
                <div class="glass-card p-6 rounded-2xl border-l-4 border-purple-500">
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Server Uptime</p>
                    <p class="text-2xl font-black text-purple-400 mt-2">99.98%</p>
                    <p class="text-xs text-slate-500 mt-1">Continuous since April 01</p>
                </div>
            </div>

            <div class="glass-card rounded-3xl overflow-hidden fade-in shadow-2xl">
                <div class="px-8 py-6 border-b border-slate-800/50 flex justify-between items-center bg-slate-900/30">
                    <h3 class="text-sm font-black text-white uppercase tracking-widest">Archive History</h3>
                </div>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-950/50 text-[10px] font-black text-slate-500 uppercase tracking-widest border-b border-slate-800/50">
                            <th class="px-8 py-5">File Reference</th>
                            <th class="px-8 py-5">Type</th>
                            <th class="px-8 py-5">File Size</th>
                            <th class="px-8 py-5">Status</th>
                            <th class="px-8 py-5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-medium text-slate-300 divide-y divide-slate-800/50">
                        @foreach($backups as $bkp)
                        <tr class="hover:bg-cyan-500/5 transition-colors group">
                            <td class="px-8 py-5">
                                <span class="font-bold text-white block">{{ $bkp->id }}</span>
                                <span class="text-[10px] text-slate-500 uppercase tracking-widest">{{ $bkp->date->format('M d, Y - H:i') }}</span>
                            </td>
                            <td class="px-8 py-5 text-slate-400">{{ $bkp->type }}</td>
                            <td class="px-8 py-5 text-slate-400 font-mono text-xs">{{ $bkp->size }}</td>
                            <td class="px-8 py-5">
                                <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-full text-[10px] font-black uppercase tracking-widest">Healthy</span>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <button class="px-4 py-1.5 bg-slate-800 text-white rounded-lg text-xs font-bold hover:bg-cyan-600 transition-all">Download</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="bg-black border border-slate-800 rounded-2xl p-6 shadow-2xl fade-in overflow-hidden relative">
                <div class="flex items-center space-x-2 mb-4 border-b border-slate-800 pb-3">
                    <div class="w-3 h-3 rounded-full bg-red-500"></div>
                    <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                    <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                    <span class="text-[10px] font-mono text-slate-500 ml-4 italic">root@echoes:~ system-log</span>
                </div>
                <div id="console" class="terminal-text text-emerald-500 text-[11px] leading-relaxed space-y-1">
                    <p>> [INFO] Initializing system diagnostic...</p>
                    <p>> [INFO] Checking MySQL connection pool... OK</p>
                    <p>> [INFO] Verifying S3 redundancy handshake... OK</p>
                    <p>> [INFO] System is secure. All protocols nominal.</p>
                </div>
            </div>
            
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            gsap.registerPlugin(ScrollTrigger);
            gsap.from(".sidebar-anim", { x: -50, opacity: 0, duration: 0.8, ease: "power3.out" });
            gsap.from(".fade-in", { y: 20, opacity: 0, duration: 0.8, stagger: 0.1, ease: "power3.out" });

            // Terminal animation
            let lines = document.querySelectorAll("#console p");
            gsap.from(lines, { opacity: 0, x: -10, stagger: 0.5, duration: 0.5, delay: 1 });
        });
    </script>
</body>
</html>