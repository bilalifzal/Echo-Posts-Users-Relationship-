<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes | Content Manager</title>
    
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
                            <a href="/studio/blogs" class="flex items-center justify-between bg-blue-50 text-blue-700 px-4 py-3 rounded-xl font-bold transition-all border border-blue-100 shadow-sm">
                                <div class="flex items-center space-x-3"><span>📚</span> <span>All Blogs</span></div>
                            </a>
                        </li>
                        <li>
                            <a href="/studio/drafts" class="flex items-center justify-between text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all">
                                <div class="flex items-center space-x-3"><span>🗂️</span> <span>Drafts</span></div>
                                <span class="bg-slate-100 text-slate-500 text-xs px-2 py-1 rounded-md">3</span>
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
                                <span class="bg-blue-100 text-blue-600 font-bold text-xs px-2 py-1 rounded-md">New</span>
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
            <div class="max-w-5xl mx-auto w-full space-y-8">

                <div class="header-anim border-b border-slate-200 pb-6 flex justify-between items-end">
                    <div>
                        <h1 class="text-4xl font-black text-slate-800 tracking-tight">Content Manager</h1>
                        <p class="text-slate-500 mt-2 text-lg">A proper CRUD system for your publications.</p>
                    </div>
                    <a href="/dashboard" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-teal-500 text-white font-bold rounded-full shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        + New Post
                    </a>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden table-anim">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-100 border-b border-slate-200 text-xs uppercase tracking-widest text-slate-500 font-black">
                                <th class="p-4 pl-6 w-1/2">Blog Post</th>
                                <th class="p-4">Status</th>
                                <th class="p-4 text-center">Interactions</th>
                                <th class="p-4 pr-6 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($myPosts as $post)
                                <tr class="hover:bg-slate-50 transition-colors group">
                                    
                                    <td class="p-4 pl-6">
                                        <div class="flex items-center space-x-4">
                                            <div class="h-12 w-16 bg-slate-200 rounded-lg overflow-hidden flex-shrink-0 border border-slate-200">
                                                @if($post->image_path)
                                                    <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full h-full object-cover">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center text-[10px] text-slate-400 font-bold">NO IMG</div>
                                                @endif
                                            </div>
                                            <div>
                                                <p class="font-black text-slate-800 text-lg group-hover:text-blue-600 transition-colors truncate max-w-sm">
                                                    {{ $post->title ?? 'Untitled Post' }}
                                                </p>
                                                <p class="text-xs text-slate-500 font-semibold mt-1">
                                                    Published: {{ $post->created_at->format('M d, Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="p-4">
                                        <span class="bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs font-black border border-green-200">
                                            🟢 Published
                                        </span>
                                    </td>

                                    <td class="p-4 text-center">
                                        <div class="flex items-center justify-center space-x-3">
                                            <span class="bg-pink-50 text-pink-600 px-2 py-1 rounded-md text-xs font-black border border-pink-100">
                                                ❤️ {{ $post->likes->count() }}
                                            </span>
                                            <span class="bg-blue-50 text-blue-600 px-2 py-1 rounded-md text-xs font-black border border-blue-100">
                                                💬 {{ $post->comments->count() }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="p-4 pr-6 text-right">
                                        <div class="flex items-center justify-end space-x-2">
                                            <button onclick="openModal('insights-{{ $post->id }}')" class="px-3 py-2 bg-slate-100 text-slate-600 text-xs font-bold rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition-colors border border-slate-200">
                                                📊 Insights
                                            </button>
                                            
                                         <a href="{{ route('posts.edit', $post->id) }}" class="...">
    ✍️ 
</a>
                                            
                                            <button onclick="openModal('delete-{{ $post->id }}')" class="px-3 py-2 bg-red-50 text-red-600 text-xs font-bold rounded-lg hover:bg-red-500 hover:text-white transition-colors border border-red-200">
                                                🗑️ Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <div id="insights-{{ $post->id }}" class="fixed inset-0 z-[100] hidden items-center justify-center px-4">
                                    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeModal('insights-{{ $post->id }}')"></div>
                                    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl max-h-[85vh] overflow-hidden flex flex-col relative z-10 modal-content">
                                        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                                            <div>
                                                <h2 class="text-2xl font-black text-slate-800">📊 Post Insights</h2>
                                                <p class="text-sm font-bold text-slate-500">{{ $post->title }}</p>
                                            </div>
                                            <button onclick="closeModal('insights-{{ $post->id }}')" class="text-slate-400 hover:text-red-500 font-black text-2xl px-2">&times;</button>
                                        </div>
                                        <div class="flex-1 overflow-y-auto p-6 grid grid-cols-2 gap-6">
                                            <div class="bg-slate-50 border border-slate-200 rounded-xl p-4">
                                                <h3 class="font-black text-slate-400 uppercase tracking-widest text-xs mb-4">❤️ Liked By</h3>
                                                <ul class="space-y-2">
                                                    @forelse($post->likes as $like)
                                                        <li class="bg-white p-2 rounded-lg shadow-sm font-bold text-sm text-slate-700 border border-slate-100">{{ $like->user->name }}</li>
                                                    @empty
                                                        <li class="text-sm text-slate-400 italic">No likes yet.</li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                            <div class="bg-slate-50 border border-slate-200 rounded-xl p-4">
                                                <h3 class="font-black text-slate-400 uppercase tracking-widest text-xs mb-4">💬 Comments</h3>
                                                <ul class="space-y-2">
                                                    @forelse($post->comments as $comment)
                                                        <li class="bg-white p-3 rounded-lg shadow-sm border border-slate-100">
                                                            <div class="font-black text-slate-800 text-xs mb-1">{{ $comment->user->name }}</div>
                                                            <p class="text-slate-600 font-medium text-sm">{{ $comment->body }}</p>
                                                        </li>
                                                    @empty
                                                        <li class="text-sm text-slate-400 italic">No comments yet.</li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="delete-{{ $post->id }}" class="fixed inset-0 z-[100] hidden items-center justify-center px-4">
                                    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeModal('delete-{{ $post->id }}')"></div>
                                    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-8 text-center relative z-10 modal-content border border-red-200">
                                        <div class="h-20 w-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center text-4xl mx-auto mb-6">🗑️</div>
                                        <h2 class="text-3xl font-black text-slate-800 mb-2">Delete Post?</h2>
                                        <p class="text-slate-500 font-medium mb-8">Permanently delete <br><span class="font-bold text-slate-700">"{{ $post->title }}"</span>?</p>
                                        <div class="flex space-x-4">
                                            <button onclick="closeModal('delete-{{ $post->id }}')" class="flex-1 py-3 bg-slate-100 text-slate-600 font-black rounded-xl hover:bg-slate-200 transition-colors">Cancel</button>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="flex-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-full py-3 bg-red-500 text-white font-black rounded-xl hover:bg-red-600 transition-colors">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <tr>
                                    <td colspan="4" class="p-16 text-center bg-slate-50">
                                        <div class="text-6xl mb-4 grayscale opacity-50">📭</div>
                                        <h3 class="text-2xl font-black text-slate-800 mb-2">No blogs published yet</h3>
                                        <p class="text-slate-500 font-medium mb-6">Your CRUD table is empty.</p>
                                        <a href="/dashboard" class="px-8 py-3 bg-blue-600 text-white font-bold rounded-full shadow-lg hover:bg-blue-700 transition-colors inline-block">Write Your First Blog</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <footer id="global-footer-space" class="mt-20 h-32 border-t border-slate-200 flex items-center justify-center w-full">
                    <p class="text-slate-300 font-mono text-sm font-bold">[ Footer UI Component will be inserted here ]</p>
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
            
            gsap.fromTo(content, 
                { scale: 0.9, opacity: 0, y: 20 },
                { scale: 1, opacity: 1, y: 0, duration: 0.4, ease: "back.out(1.5)" }
            );
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            const content = modal.querySelector('.modal-content');
            
            gsap.to(content, {
                scale: 0.95, opacity: 0, y: 10, duration: 0.2, ease: "power2.in",
                onComplete: () => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }
            });
        }

        // GSAP Nav/Sidebar Animations
        gsap.from(".top-nav", { y: -50, opacity: 0, duration: 0.6, ease: "power2.out" });
        gsap.from(".left-nav", { x: -50, opacity: 0, duration: 0.6, ease: "power2.out" });
        gsap.from(".header-anim", { y: 20, opacity: 0, duration: 0.5, delay: 0.1, ease: "power2.out" });
        gsap.from(".table-anim", { y: 30, opacity: 0, duration: 0.6, delay: 0.2, ease: "power2.out" });
    </script>
</body>
</html>