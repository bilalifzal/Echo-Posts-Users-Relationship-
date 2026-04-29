<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes | {{ $post->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans flex flex-col min-h-screen selection:bg-blue-200 selection:text-blue-900">

    <nav class="w-full bg-white/95 backdrop-blur-xl border-b border-slate-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center space-x-2 text-xl font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-teal-500 hover:opacity-80 transition-opacity">
                &larr; ECHOES
            </a>
            @auth
                <a href="/dashboard" class="text-sm font-bold text-slate-500 hover:text-blue-600">Studio</a>
            @else
                <a href="{{ route('register') }}" class="text-sm font-bold text-blue-600 hover:underline">Join Network</a>
            @endauth
        </div>
    </nav>

    <header class="max-w-4xl mx-auto px-6 pt-16 pb-10 w-full">
        <div class="flex items-center space-x-3 mb-6">
            <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-black uppercase tracking-widest">{{ $post->tags ?? 'Article' }}</span>
            <span class="text-sm font-bold text-slate-400">{{ $post->created_at->format('F d, Y') }} • {{ ceil(str_word_count(strip_tags($post->body)) / 200) }} min read</span>
        </div>
        
        <h1 class="text-4xl md:text-6xl font-black text-slate-900 leading-[1.1] mb-8 tracking-tight">
            {{ $post->title }}
        </h1>

        <div class="flex items-center justify-between py-6 border-y border-slate-200">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-slate-800 text-white rounded-full flex items-center justify-center text-lg font-black shadow-inner">
                    {{ substr($post->user->name, 0, 1) }}
                </div>
                <div>
                    <p class="text-base font-black text-slate-800">{{ $post->user->name }}</p>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-0.5">Author</p>
                </div>
            </div>
            
            <div class="flex space-x-4 text-sm font-black text-slate-500">
                <span class="flex items-center space-x-1.5"><span>❤️</span> <span>{{ $post->likes->count() }}</span></span>
                <a href="#comments" class="flex items-center space-x-1.5 hover:text-blue-600 transition-colors"><span>💬</span> <span>{{ $post->comments->count() }}</span></a>
            </div>
        </div>
    </header>

    @if($post->image_path)
    <div class="max-w-5xl mx-auto px-6 w-full mb-12">
        <div class="w-full aspect-video rounded-3xl overflow-hidden shadow-2xl">
            <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full h-full object-cover">
        </div>
    </div>
    @endif

    <main class="max-w-3xl mx-auto px-6 w-full pb-16 text-lg text-slate-700 leading-relaxed font-medium">
        <div class="prose prose-lg prose-slate prose-a:text-blue-600 hover:prose-a:text-blue-500 prose-img:rounded-2xl max-w-none">
            {!! $post->body !!}
        </div>
    </main>

    <div class="max-w-3xl mx-auto px-6 w-full py-8 border-t border-slate-200 flex items-center justify-center space-x-6">
        @auth
            <form action="{{ route('posts.like', $post->id) }}" method="POST">
                @csrf
                <button type="submit" class="group flex items-center space-x-3 px-8 py-4 bg-white border border-slate-200 rounded-full shadow-sm hover:border-pink-300 hover:shadow-pink-500/20 hover:bg-pink-50 transition-all">
                    <span class="text-2xl group-hover:scale-125 transition-transform duration-300">❤️</span>
                    <span class="font-black text-slate-600 group-hover:text-pink-600 text-lg">{{ $post->likes->count() }} Likes</span>
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="group flex items-center space-x-3 px-8 py-4 bg-white border border-slate-200 rounded-full shadow-sm hover:bg-slate-50 transition-all">
                <span class="text-2xl opacity-50">🤍</span>
                <span class="font-black text-slate-500 text-lg">Log in to Like</span>
            </a>
        @endauth
    </div>

    <section id="comments" class="bg-white border-t border-slate-200 flex-1 pt-16 pb-32">
        <div class="max-w-3xl mx-auto px-6 w-full">
            <h3 class="text-3xl font-black text-slate-800 mb-10">Discussion ({{ $post->comments->count() }})</h3>
            
            <div class="mb-12">
                @auth
                    <form action="{{ route('comments.store', $post->id) }}" method="POST" class="bg-slate-50 border border-slate-200 rounded-3xl p-6 shadow-inner">
                        @csrf
                        <div class="flex space-x-4">
                            <div class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center font-black flex-shrink-0">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <div class="flex-1">
                                <textarea name="body" rows="3" placeholder="Add to the discussion, {{ auth()->user()->name }}..." class="w-full bg-white border border-slate-300 rounded-2xl p-4 text-slate-700 font-medium focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all resize-none shadow-sm" required></textarea>
                                <div class="mt-3 flex justify-end">
                                    <button type="submit" class="px-6 py-2.5 bg-slate-900 text-white font-bold rounded-full hover:bg-blue-600 transition-colors shadow-lg">Post Comment</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="bg-slate-50 border border-slate-200 rounded-3xl p-8 text-center shadow-inner">
                        <p class="text-slate-500 font-medium mb-4">You must be logged in to join the conversation.</p>
                        <a href="{{ route('login') }}" class="px-8 py-3 bg-blue-600 text-white font-bold rounded-full hover:bg-blue-700 inline-block shadow-lg">Log in to Comment</a>
                    </div>
                @endauth
            </div>

            <div class="space-y-8">
                @forelse($post->comments as $comment)
                    <div class="flex space-x-4">
                        <div class="w-10 h-10 bg-slate-200 text-slate-600 rounded-full flex items-center justify-center font-black flex-shrink-0">
                            {{ substr($comment->user->name, 0, 1) }}
                        </div>
                        <div class="flex-1 bg-white border border-slate-100 rounded-2xl p-5 shadow-sm">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="font-black text-slate-800">{{ $comment->user->name }}</span>
                                <span class="text-xs font-bold text-slate-400">• {{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-slate-600 leading-relaxed font-medium">{{ $comment->body }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-slate-400 font-medium italic">No comments yet. Be the first to start the discussion!</p>
                @endforelse
            </div>
        </div>
    </section>

    @include('components.footer')

</body>
</html>