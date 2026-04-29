<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes | Drafts</title>
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
                            <a href="/studio/drafts" class="flex items-center justify-between bg-blue-50 text-blue-700 px-4 py-3 rounded-xl font-bold transition-all border border-blue-100 shadow-sm">
                                <div class="flex items-center space-x-3"><span>🗂️</span> <span>Drafts</span></div>
                                <span class="bg-blue-200 text-blue-800 text-xs px-2 py-1 rounded-md">{{ $drafts->count() }}</span>
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
                            <a href="/studio/liked" class="flex items-center space-x-3 text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all">
                                <span>❤️</span> <span>Liked Posts</span>
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
                            <a href="#" class="flex items-center space-x-3 text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all">
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
                        <h1 class="text-4xl font-black text-slate-800 tracking-tight">Your Drafts</h1>
                        <p class="text-slate-500 mt-2 text-lg">Unfinished masterpieces waiting for their final polish.</p>
                    </div>
                    <a href="/dashboard" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-full shadow-lg hover:bg-blue-700 transition-all hover:-translate-y-1">
                        + New Post
                    </a>
                </div>

                <div class="space-y-5">
                    @forelse ($drafts as $post)
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
                                        <span class="bg-yellow-50 text-yellow-700 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest border border-yellow-200 flex items-center space-x-1">
                                            <span class="h-1.5 w-1.5 bg-yellow-500 rounded-full"></span>
                                            <span>Draft</span>
                                        </span>
                                        <span class="text-xs font-bold text-slate-400">Last edited {{ $post->updated_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-sm text-slate-500 truncate font-medium">{{ Str::limit(strip_tags($post->body), 80) }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3 flex-shrink-0 pl-6 border-l border-slate-100">
                                <a href="{{ route('posts.edit', $post->id) }}" class="px-5 py-2.5 bg-slate-50 text-blue-600 rounded-xl hover:bg-blue-50 transition-all border border-slate-200 font-bold text-sm shadow-sm flex items-center space-x-2">
                                    <span>✍️</span> <span>Resume Writing</span>
                                </a>
                                
                                <button onclick="openModal('delete-{{ $post->id }}')" class="p-2.5 bg-slate-50 text-slate-500 rounded-xl hover:bg-red-50 hover:text-red-600 transition-all border border-slate-200 font-bold text-sm shadow-sm">🗑️</button>
                            </div>
                        </div>

                        <div id="delete-{{ $post->id }}" class="fixed inset-0 z-[100] hidden items-center justify-center px-4">
                            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeModal('delete-{{ $post->id }}')"></div>
                            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-8 text-center relative z-10 modal-content">
                                <div class="h-20 w-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center text-4xl mx-auto mb-6">🗑️</div>
                                <h2 class="text-3xl font-black text-slate-800 mb-2">Delete Draft?</h2>
                                <p class="text-slate-500 font-medium mb-8">Are you sure you want to discard "{{ $post->title }}"?</p>
                                <div class="flex space-x-4">
                                    <button onclick="closeModal('delete-{{ $post->id }}')" class="flex-1 py-3 bg-slate-100 text-slate-600 font-bold rounded-xl hover:bg-slate-200 transition-all">Cancel</button>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="flex-1">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="w-full py-3 bg-red-500 text-white font-bold rounded-xl shadow-lg hover:bg-red-600 transition-all">Confirm Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white border-2 border-dashed border-slate-200 rounded-3xl p-16 text-center">
                            <p class="text-5xl mb-4 grayscale opacity-50">🗂️</p>
                            <h3 class="text-2xl font-black text-slate-800">No drafts here</h3>
                            <p class="text-slate-500 font-medium mt-2 mb-6">You either published everything or haven't started yet.</p>
                            <a href="/dashboard" class="px-8 py-3 bg-blue-600 text-white font-bold rounded-full shadow-lg hover:bg-blue-700 transition-colors inline-block">Start a new draft</a>
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
        function openModal(id) {
            const modal = document.getElementById(id);
            const content = modal.querySelector('.modal-content');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            gsap.fromTo(content, { scale: 0.9, opacity: 0, y: 20 }, { scale: 1, opacity: 1, y: 0, duration: 0.4, ease: "back.out(1.5)" });
        }
        function closeModal(id) {
            const modal = document.getElementById(id);
            const content = modal.querySelector('.modal-content');
            gsap.to(content, { scale: 0.95, opacity: 0, y: 10, duration: 0.2, ease: "power2.in", onComplete: () => { modal.classList.add('hidden'); modal.classList.remove('flex'); } });
        }
        gsap.from(".top-nav", { y: -50, opacity: 0, duration: 0.6 });
        gsap.from(".left-nav", { x: -50, opacity: 0, duration: 0.6 });
        gsap.from(".header-anim", { y: 20, opacity: 0, duration: 0.5, delay: 0.1 });
        gsap.from(".blog-row", { y: 30, opacity: 0, stagger: 0.1, duration: 0.6, ease: "back.out(1.2)", delay: 0.2 });
    </script>
</body>
</html>