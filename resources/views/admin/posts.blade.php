<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes | Global Post Feed</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body class="bg-[#0B1120] text-slate-300 antialiased font-sans flex min-h-screen selection:bg-blue-500/30">

    @if(session('success'))
        <div id="flash-message" class="fixed top-6 right-6 z-[100] bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-6 py-4 rounded-2xl shadow-2xl flex items-center space-x-3 backdrop-blur-md">
            <span class="text-xl">✅</span>
            <div>
                <p class="text-sm font-black uppercase tracking-widest">Command Executed</p>
                <p class="text-xs font-bold text-slate-300 mt-0.5">{{ session('success') }}</p>
            </div>
        </div>
    @endif

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

            <a href="{{ route('admin.posts') }}" class="flex items-center justify-between px-4 py-3 bg-blue-600/10 text-blue-400 rounded-xl font-bold border border-blue-500/20 group">
                <div class="flex items-center space-x-3"><span>📝</span> <span>Global Post Feed</span></div>
                <div class="flex items-center space-x-2">
                    <span class="text-[10px]">{{ number_format($posts->total() ?? 0) }}</span>
                    <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                </div>
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
                <input type="text" placeholder="Search posts by title or tag..." class="w-full bg-slate-950 border border-slate-800 text-slate-300 text-sm rounded-full pl-10 pr-4 py-2.5 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
            </div>

            <div class="flex items-center space-x-6">
                <button class="text-slate-400 hover:text-white relative">
                    <span>🔔</span>
                    <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 border-2 border-[#0B1120] rounded-full"></span>
                </button>
                <div class="w-px h-6 bg-slate-800"></div>
                <div class="flex items-center space-x-4">
                    <button class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white text-xs font-black uppercase tracking-widest rounded-lg transition-colors border border-slate-700">
                        Content Policy
                    </button>
                </div>
            </div>
        </header>

        <div class="p-8 z-10 flex-1 space-y-8 max-w-screen-2xl mx-auto w-full">
            
            <div class="fade-in flex justify-between items-end">
                <div>
                    <h2 class="text-3xl font-black text-white tracking-tight">Post Moderation Engine</h2>
                    <p class="text-slate-400 font-medium mt-1">Total God Mode over content. Unpublish, ban, or delete any masterpiece.</p>
                </div>
            </div>

            <div class="bg-slate-900 border border-slate-800 rounded-3xl shadow-xl overflow-hidden fade-in flex flex-col">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-950/80 text-[10px] font-black text-slate-500 uppercase tracking-widest border-b border-slate-800/50">
                                <th class="px-8 py-5">Masterpiece</th>
                                <th class="px-8 py-5">Creator</th>
                                <th class="px-8 py-5 text-center">Engagement</th>
                                <th class="px-8 py-5">Status</th>
                                <th class="px-8 py-5 text-right">God Mode Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-medium text-slate-300 divide-y divide-slate-800/50">
                            @forelse($posts as $post)
                            <tr class="hover:bg-slate-800/50 transition-colors group">
                                
                                <td class="px-8 py-4 flex items-center space-x-4 max-w-sm">
                                    <div class="w-16 h-12 bg-slate-800 rounded-lg border border-slate-700 overflow-hidden shrink-0">
                                        @if($post->image_path)
                                            <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-xl opacity-30">📝</div>
                                        @endif
                                    </div>
                                    <div class="truncate">
                                        <a href="{{ route('posts.show', $post->id) }}" target="_blank" class="font-bold text-white block truncate hover:text-blue-400 transition-colors">
                                            {{ $post->title }}
                                        </a>
                                        <span class="text-[10px] text-blue-400 uppercase tracking-widest font-black">{{ $post->tags ?? 'Uncategorized' }}</span>
                                    </div>
                                </td>

                                <td class="px-8 py-4">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-6 h-6 bg-slate-800 rounded-full flex items-center justify-center text-white font-black text-[10px]">
                                            {{ substr($post->user->name ?? '?', 0, 1) }}
                                        </div>
                                        <span class="text-slate-400">{{ $post->user->name ?? 'Unknown' }}</span>
                                    </div>
                                </td>

                                <td class="px-8 py-4 text-center">
                                    <div class="flex items-center justify-center space-x-3 text-xs font-black">
                                        <span class="text-pink-500">❤️ {{ $post->likes->count() }}</span>
                                        <span class="text-blue-400">💬 {{ $post->comments->count() }}</span>
                                    </div>
                                </td>

                                <td class="px-8 py-4">
                                    @if($post->status === 'published')
                                        <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-full text-[10px] font-black uppercase tracking-widest">Public</span>
                                    @else
                                        <span class="px-3 py-1 bg-amber-500/10 text-amber-500 border border-amber-500/20 rounded-full text-[10px] font-black uppercase tracking-widest">Unpublished/Banned</span>
                                    @endif
                                </td>

                                <td class="px-8 py-4 text-right">
                                    <div class="flex justify-end space-x-2 opacity-30 group-hover:opacity-100 transition-opacity">
                                        
                                        <form action="{{ route('admin.posts.toggle', $post->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            @if($post->status === 'published')
                                                <button type="submit" class="px-3 py-1.5 bg-amber-500/10 text-amber-500 border border-amber-500/20 rounded-lg text-xs font-bold hover:bg-amber-500 hover:text-white transition-colors" title="Hide this post from the public feed">
                                                    Ban Post
                                                </button>
                                            @else
                                                <button type="submit" class="px-3 py-1.5 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-lg text-xs font-bold hover:bg-emerald-500 hover:text-white transition-colors">
                                                    Restore
                                                </button>
                                            @endif
                                        </form>

                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline" onsubmit="return confirm('God Mode Warning: Are you sure you want to completely DELETE this post from the database?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1.5 bg-red-500/10 text-red-500 border border-red-500/20 rounded-lg text-xs font-bold hover:bg-red-500 hover:text-white transition-colors">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-8 py-20 text-center text-slate-500">
                                    <div class="text-4xl mb-4">📭</div>
                                    <p class="font-bold text-lg">No posts published on the network yet.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($posts->hasPages())
                <div class="p-6 border-t border-slate-800 bg-slate-950/30">
                    {{ $posts->links() }}
                </div>
                @endif
            </div>
            
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            gsap.registerPlugin(ScrollTrigger);

            gsap.from(".sidebar-anim", { x: -50, opacity: 0, duration: 0.8, ease: "power3.out" });
            gsap.from(".fade-in", { y: 20, opacity: 0, duration: 0.8, stagger: 0.1, delay: 0.1, ease: "power3.out" });

            // Flash Message Animation (Slides in, waits 4 seconds, slides out)
            if (document.getElementById('flash-message')) {
                let flash = document.getElementById('flash-message');
                gsap.fromTo(flash, 
                    { x: 100, opacity: 0 }, 
                    { x: 0, opacity: 1, duration: 0.5, ease: "power3.out" }
                );
                setTimeout(() => {
                    gsap.to(flash, { x: 100, opacity: 0, duration: 0.5, ease: "power3.in", onComplete: () => flash.remove() });
                }, 4000);
            }
        });
    </script>
</body>
</html>