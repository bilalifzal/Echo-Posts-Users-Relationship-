<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes | Edit Masterpiece</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden font-sans flex flex-col min-h-screen">

    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-slate-200 px-8 py-3 flex justify-between items-center top-nav shadow-sm h-16">
        <div class="flex items-center space-x-2">
            <div class="text-2xl font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-teal-500">ECHOES</div>
            <span class="text-xs font-bold bg-blue-100 text-blue-600 px-2 py-1 rounded-md tracking-widest ml-2">STUDIO</span>
        </div>
        <div class="flex items-center space-x-6">
            <span class="text-slate-600 font-semibold border-r border-slate-300 pr-6">Welcome, {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-5 py-2 bg-red-50 text-red-600 font-bold rounded-full hover:bg-red-100 transition-all duration-300 border border-red-200 shadow-sm text-sm">Log Out</button>
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
            <div class="max-w-4xl mx-auto w-full space-y-12">

                <div class="border-b border-slate-200 pb-6 flex justify-between items-center">
                    <div>
                        <h1 class="text-4xl font-black text-slate-800 tracking-tight">Edit Masterpiece</h1>
                        <p class="text-slate-500 mt-2 text-lg">Update your content and save changes.</p>
                    </div>
                    <a href="/studio/blogs" class="text-slate-500 font-bold hover:text-slate-800">Cancel</a>
                </div>

                <div class="bg-white border border-slate-200 shadow-xl rounded-3xl p-8 relative">
                    <form id="post-form" action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="flex items-center justify-between bg-slate-50 p-4 rounded-2xl border border-slate-200">
                            <div class="flex-1 mr-4">
                                <label class="block text-sm font-bold text-slate-600 mb-1">Update Cover Image (Optional)</label>
                                <input type="file" name="image" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200 cursor-pointer">
                            </div>
                            <div class="flex space-x-4">
                                <div>
                                    <label class="block text-sm font-bold text-slate-600 mb-1">Status</label>
                                    <select name="status" class="bg-white border border-slate-300 text-slate-700 rounded-lg px-4 py-2 font-bold outline-none">
                                        <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>🟢 Published</option>
                                        <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>🟡 Draft</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <input type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full bg-transparent border-b-2 border-slate-200 text-slate-900 px-2 py-4 focus:border-blue-500 outline-none font-black text-4xl">
                        
                        <div class="grid grid-cols-2 gap-6 mt-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-600 mb-2">Category / Tags</label>
                                <input type="text" name="tags" value="{{ old('tags', $post->tags) }}" class="w-full bg-white border border-slate-200 text-slate-800 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-600 mb-2">SEO Excerpt</label>
                                <input type="text" name="excerpt" value="{{ old('excerpt', $post->excerpt) }}" class="w-full bg-white border border-slate-200 text-slate-800 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <label class="block text-sm font-bold text-slate-600 mb-2">Blog Content</label>
                            <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
                                <div id="editor-container" class="h-[400px] text-lg text-slate-800 bg-white">{!! old('body', $post->body) !!}</div>
                            </div>
                        </div>
                        
                        <input type="hidden" name="body" id="hidden-body">
                        <input type="hidden" name="visibility" value="public">

                        <div class="flex justify-end pt-6 border-t border-slate-100">
                            <button type="submit" class="px-10 py-4 bg-gradient-to-r from-blue-600 to-teal-500 text-white font-black text-lg rounded-full shadow-lg hover:shadow-blue-500/40 hover:-translate-y-1 transition-all">
                                Update Masterpiece
                            </button>
                        </div>
                    </form>
                </div>

                <footer id="global-footer-space" class="mt-20 h-32 border-t border-slate-200 flex items-center justify-center">
                    <p class="text-slate-300 font-mono text-sm">[ Footer UI Component will be inserted here ]</p>
                </footer>
            </div>
        </main>
    </div>

    <script>
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: { toolbar: [ [{ 'font': [] }, { 'size': [] }], ['bold', 'italic', 'underline', 'strike'], [{ 'color': [] }, { 'background': [] }], [{ 'header': 1 }, { 'header': 2 }, 'blockquote', 'code-block'], [{ 'list': 'ordered'}, { 'list': 'bullet' }], [{ 'align': [] }], ['link', 'image', 'video'], ['clean'] ] }
        });
        document.getElementById('post-form').onsubmit = function() {
            document.getElementById('hidden-body').value = quill.root.innerHTML; 
        };
        gsap.from(".top-nav", { y: -100, opacity: 0, duration: 0.8 });
        gsap.from(".left-nav", { x: -100, opacity: 0, duration: 0.8 });
    </script>
</body>
</html>