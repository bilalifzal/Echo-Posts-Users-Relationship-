<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes | Liked Masterpieces</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans flex flex-col min-h-screen">

    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-slate-200 px-8 py-3 flex justify-between items-center top-nav shadow-sm h-16">
        <div class="flex items-center space-x-2">
            <div class="text-2xl font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-teal-500">
                ECHOES
            </div>
            <span class="text-xs font-bold bg-blue-100 text-blue-600 px-2 py-1 rounded-md tracking-widest ml-2">STUDIO</span>
        </div>
        
        <div class="flex items-center space-x-6">
            <span class="text-slate-600 font-semibold border-r border-slate-300 pr-6">Welcome, {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-5 py-2 bg-red-50 text-red-600 font-bold rounded-full hover:bg-red-100 transition-all duration-300 border border-red-200 shadow-sm text-sm">
                    Log Out
                </button>
            </form>
        </div>
    </nav>

    <div class="flex flex-1 pt-16">

        <aside class="w-64 fixed h-[calc(100vh-4rem)] bg-white border-r border-slate-200 shadow-sm left-nav overflow-y-auto z-40">
            <div class="p-6 space-y-8">
                <div>
                    <h3 class="text-xs font-black text-slate-400 tracking-wider mb-4 uppercase">Blog Management</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="/dashboard" class="flex items-center justify-between text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all">
                                <div class="flex items-center space-x-3"><span>✍️</span> <span>Write Post</span></div>
                            </a>
                        </li>
                        <li>
                            <a href="/studio/blogs" class="flex items-center justify-between text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all">
                                <div class="flex items-center space-x-3"><span>📚</span> <span>All Blogs</span></div>
                            </a>
                        </li>
                        <li>
                            <a href="/studio/drafts" class="flex items-center justify-between text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all">
                                <div class="flex items-center space-x-3"><span>🗂️</span> <span>Drafts</span></div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all">
                                <div class="flex items-center space-x-3"><span>⏳</span> <span>Scheduled</span></div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-black text-slate-400 tracking-wider mb-4 uppercase">Network</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="/studio/liked" class="flex items-center justify-between bg-blue-50 text-blue-700 px-4 py-3 rounded-xl font-bold transition-all border border-blue-100 shadow-sm">
                                <div class="flex items-center space-x-3"><span>❤️</span> <span>Liked Posts</span></div>
                                <span class="bg-blue-200 text-blue-800 text-xs px-2 py-1 rounded-md">{{ $likedPosts->count() }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="/studio/comments" class="flex items-center justify-between text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all">
                                <div class="flex items-center space-x-3"><span>💬</span> <span>Comments</span></div>
                                <span class="bg-slate-100 text-slate-500 font-bold text-xs px-2 py-1 rounded-md">New</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-black text-slate-400 tracking-wider mb-4 uppercase">Account</h3>
                    <ul class="space-y-2">
                        <li>
                             <a href="/studio/analytics" class="flex items-center space-x-3 bg-blue-50 text-blue-700 px-4 py-3 rounded-xl font-bold transition-all border border-blue-100 shadow-sm">
                                <span>📊</span> <span>Analytics</span>
                            </a>
                        </li>
                        <li>
                            <a href="/profile" class="flex items-center space-x-3 text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all">
                                <span>⚙️</span> <span>Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

        <main class="flex-1 ml-64 p-8 flex flex-col min-h-full">
            <div class="max-w-5xl mx-auto w-full space-y-10">

                <div class="border-b border-slate-200 pb-6 flex justify-between items-end header-anim">
                    <div>
                        <h1 class="text-4xl font-black text-slate-800 tracking-tight">Liked Masterpieces</h1>
                        <p class="text-slate-500 mt-2 text-lg">Your curated library of favorite posts from the network.</p>
                    </div>
                    <a href="/dashboard" class="px-6 py-3 bg-white border border-slate-300 text-slate-600 font-bold rounded-full shadow-sm hover:bg-slate-50 transition-all">
                        Discover More
                    </a>
                </div>

                <div class="space-y-5">
                    @forelse ($likedPosts as $post)
                        <div class="blog-row bg-white border border-slate-200 rounded-3xl p-5 flex items-center justify-between shadow-sm hover:shadow-xl transition-all duration-300 group">
                            
                            <div class="flex items-center space-x-6 flex-1 min-w-0 pr-4">
                                <div class="h-24 w-36 bg-slate-100 rounded-2xl overflow-hidden border border-slate-200 shadow-inner flex-shrink-0 relative">
                                    @if($post->image_path)
                                        <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                                            <span class="text-2xl">📝</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-2xl font-black text-slate-900 truncate mb-1 group-hover:text-blue-600 transition-colors">
                                        {{ $post->title ?? 'Untitled Masterpiece' }}
                                    </h3>
                                    <div class="flex items-center space-x-3 mb-2">
                                        <span class="bg-pink-50 text-pink-700 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest border border-pink-200 flex items-center space-x-1">
                                            <span>✍️ {{ $post->user->name }}</span>
                                        </span>
                                        <span class="text-xs font-bold text-slate-400">{{ $post->created_at->format('M d, Y') }}</span>
                                    </div>
                                    <p class="text-sm text-slate-500 truncate font-medium">{{ Str::limit(strip_tags($post->body), 80) }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3 flex-shrink-0 pl-6 border-l border-slate-100">
                                <a href="#" class="px-4 py-2.5 bg-slate-50 text-slate-600 rounded-xl hover:bg-blue-50 hover:text-blue-600 transition-all border border-slate-200 font-bold text-sm shadow-sm flex items-center space-x-2">
                                    <span>👀</span> <span>Read</span>
                                </a>
                                
                                <form action="{{ route('posts.like', $post->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="p-2.5 bg-pink-50 text-pink-500 rounded-xl hover:bg-red-500 hover:text-white transition-all border border-pink-100 font-bold text-sm shadow-sm" title="Remove Like">
                                        ❤️
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white border-2 border-dashed border-slate-200 rounded-3xl p-16 text-center">
                            <p class="text-5xl mb-4 grayscale opacity-50">❤️</p>
                            <h3 class="text-2xl font-black text-slate-800">No liked posts yet</h3>
                            <p class="text-slate-500 font-medium mt-2 mb-6">Explore the network and show some love to other creators.</p>
                            <a href="/dashboard" class="px-8 py-3 bg-green-500 text-black font-bold rounded-full shadow-lg hover:bg-pink-600 transition-colors inline-block">Go Discover</a>
                        </div>
                    @endforelse
                </div>

                <footer id="global-footer-space" class="mt-auto pt-16 pb-8 border-t border-slate-200 text-center w-full">
                    <p class="text-slate-300 font-mono text-sm">[ Footer UI Component will be inserted here ]</p>
                </footer>

            </div>
        </main>
    </div>

    <script>
        gsap.from(".top-nav", { y: -50, opacity: 0, duration: 0.6 });
        gsap.from(".left-nav", { x: -50, opacity: 0, duration: 0.6 });
        gsap.from(".header-anim", { y: 20, opacity: 0, duration: 0.5, delay: 0.1 });
        gsap.from(".blog-row", { y: 30, opacity: 0, stagger: 0.1, duration: 0.6, ease: "back.out(1.2)", delay: 0.2 });
    </script>
</body>
</html>