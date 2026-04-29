<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes | Creator Studio</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden font-sans flex flex-col min-h-screen">

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
                            <a href="/dashboard" class="flex items-center justify-between bg-blue-50 text-blue-700 px-4 py-3 rounded-xl font-bold transition-all border border-blue-100 shadow-sm">
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
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-black text-slate-400 tracking-wider mb-4 uppercase">Account</h3>
                    <ul class="space-y-2">
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
            <div class="max-w-4xl mx-auto w-full space-y-12">

                <div class="header-anim border-b border-slate-200 pb-6 flex justify-between items-end">
                    <div>
                        <h1 class="text-4xl font-black text-slate-800 tracking-tight">Write a Masterpiece</h1>
                        <p class="text-slate-500 mt-2 text-lg">Focus purely on your content. The world is waiting.</p>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 shadow-xl rounded-3xl p-8 relative editor-anim">
                    
                    <form id="post-form" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <div class="flex items-center justify-between bg-slate-50 p-4 rounded-2xl border border-slate-200">
                            <div class="flex-1 mr-4">
                                <label class="block text-sm font-bold text-slate-600 mb-1">Featured Cover Image</label>
                                <input type="file" name="image" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200 cursor-pointer">
                            </div>
                            <div class="flex space-x-4">
                                <div>
                                    <label class="block text-sm font-bold text-slate-600 mb-1">Visibility</label>
                                    <select name="visibility" class="bg-white border border-slate-300 text-slate-700 rounded-lg px-4 py-2 font-bold focus:ring-2 focus:ring-blue-500 outline-none cursor-pointer shadow-sm">
                                        <option value="public">🌍 Public</option>
                                        <option value="private">🔒 Private</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-600 mb-1">Status</label>
                                    <select name="status" class="bg-white border border-slate-300 text-slate-700 rounded-lg px-4 py-2 font-bold focus:ring-2 focus:ring-blue-500 outline-none cursor-pointer shadow-sm">
                                        <option value="published">🟢 Publish Now</option>
                                        <option value="draft">🟡 Save as Draft</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div>
                            <input type="text" name="title" id="blog-title" placeholder="Enter a captivating title..." 
                                   class="w-full bg-transparent border-b-2 border-slate-200 text-slate-900 px-2 py-4 focus:border-blue-500 outline-none transition-all placeholder-slate-300 font-black text-4xl">
                            <p class="text-xs text-slate-400 mt-2 px-2 font-mono">Live URL: echoes.com/blog/<span id="slug-preview" class="text-blue-500 font-bold">your-title-here</span></p>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-600 mb-2">Category / Tags</label>
                                <input type="text" name="tags" placeholder="e.g. Technology, Coding, Laravel" class="w-full bg-white border border-slate-200 text-slate-800 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-600 mb-2">SEO Excerpt (150 chars)</label>
                                <input type="text" name="excerpt" placeholder="A brief summary for search engines..." class="w-full bg-white border border-slate-200 text-slate-800 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <label class="block text-sm font-bold text-slate-600 mb-2 flex justify-between items-center">
                                <span>Blog Content</span>
                                <span id="word-count" class="text-xs bg-slate-100 text-slate-500 px-2 py-1 rounded">0 words</span>
                            </label>
                            <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
                                <div id="editor-container" class="h-[400px] text-lg text-slate-800 bg-white"></div>
                            </div>
                        </div>
                        
                        <input type="hidden" name="body" id="hidden-body">

                        <div class="flex justify-end pt-6 border-t border-slate-100">
                            <button type="submit" class="px-10 py-4 bg-gradient-to-r from-blue-600 to-teal-500 text-white font-black text-lg rounded-full shadow-lg hover:shadow-blue-500/40 hover:-translate-y-1 transition-all duration-300">
                                Publish Masterpiece
                            </button>
                        </div>
                    </form>
                </div>

                <div class="mt-16 pt-8 border-t border-slate-300">
                    <h2 class="text-2xl font-black text-slate-800 mb-8 flex items-center space-x-2">
                        <span>📰</span> <span>Your Most Recent Post</span>
                    </h2>
                    
                    @php
                        // Smart Work: This filters all posts to find the single newest one written by THIS logged-in user.
                        $latestPost = $posts->where('user_id', auth()->id())->first();
                    @endphp

                    @if($latestPost)
                        <div class="bg-white border border-slate-200 shadow-md hover:shadow-xl transition-shadow duration-300 rounded-3xl overflow-hidden relative">
                            <div class="p-8">
                                <div class="flex items-center space-x-3 mb-6">
                                    <div class="h-10 w-10 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold">
                                        {{ substr(auth()->user()->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-slate-800">{{ auth()->user()->name }}</h3>
                                        <p class="text-xs text-slate-500">{{ $latestPost->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>

                                @if($latestPost->title)
                                    <h4 class="text-3xl font-extrabold text-slate-900 mb-4">{{ $latestPost->title }}</h4>
                                @endif
                                
                                <div class="prose prose-slate max-w-none text-slate-600 line-clamp-3">
                                    {!! $latestPost->body !!}
                                </div>
                            </div>

                            @if($latestPost->image_path)
                                <div class="px-8 pb-8">
                                    <img src="{{ asset('storage/' . $latestPost->image_path) }}" alt="Cover" class="w-full rounded-2xl object-cover max-h-64 border border-slate-200">
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="bg-slate-100 border-2 border-dashed border-slate-300 rounded-3xl p-12 text-center">
                            <h3 class="text-xl font-bold text-slate-500 mb-2">Nothing here yet!</h3>
                            <p class="text-slate-400">Your most recently published blog will appear right here after you submit the form above.</p>
                        </div>
                    @endif
                </div>

                <footer id="global-footer-space" class="mt-20 h-32 border-t border-slate-200 flex items-center justify-center">
                    <p class="text-slate-300 font-mono text-sm">[ Footer UI Component will be inserted here ]</p>
                </footer>

            </div>
        </main>
    </div>

    <script>
        // 1. Initialize Full-Width Quill Editor
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            placeholder: 'Tell your story here...',
            modules: {
                toolbar: [
                    [{ 'font': [] }, { 'size': ['small', false, 'large', 'huge'] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'header': 1 }, { 'header': 2 }, 'blockquote', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'align': [] }],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            }
        });

        const titleInput = document.getElementById('blog-title');
        const slugPreview = document.getElementById('slug-preview');
        const wordCountDisplay = document.getElementById('word-count');
        const hiddenBody = document.getElementById('hidden-body');

        // Form Submit hidden input hook
        document.getElementById('post-form').onsubmit = function() {
            hiddenBody.value = quill.root.innerHTML; 
        };

        // Live Title & Slug Generator
        titleInput.addEventListener('input', function() {
            const val = this.value;
            slugPreview.textContent = val.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '') || 'your-title-here';
        });

        // Editor Live Update & Word Count
        quill.on('text-change', function() {
            const text = quill.getText().trim();
            const words = text.length > 0 ? text.split(/\s+/).length : 0;
            wordCountDisplay.textContent = `${words} words`;
        });

        // GSAP Animations
        gsap.registerPlugin(ScrollTrigger);
        gsap.from(".top-nav", { y: -100, opacity: 0, duration: 1, ease: "power4.out" });
        gsap.from(".left-nav", { x: -100, opacity: 0, duration: 1, delay: 0.2, ease: "power3.out" });
        gsap.from(".header-anim", { y: 30, opacity: 0, duration: 0.8, delay: 0.3, ease: "power3.out" });
        gsap.from(".editor-anim", { y: 50, opacity: 0, duration: 1, delay: 0.4, ease: "power3.out" });
    </script>
</body>
</html>