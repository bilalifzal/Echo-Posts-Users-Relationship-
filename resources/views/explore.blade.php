<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes | Explore {{ $displayTopic }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans flex flex-col min-h-screen">

    <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-xl border-b border-slate-200 shadow-sm top-0">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-teal-500">
                &larr; ECHOES
            </a>
            <div class="flex space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-blue-600 text-white font-bold rounded-full hover:bg-blue-700">Studio</a>
                @else
                    <a href="{{ route('login') }}" class="text-slate-600 font-bold hover:text-blue-600 mt-2">Sign In</a>
                @endauth
            </div>
        </div>
    </nav>

    <header class="pt-32 pb-16 bg-slate-900 text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')]"></div>
        <div class="relative z-10 max-w-3xl mx-auto px-6">
            <span class="px-4 py-1 rounded-full border border-slate-700 bg-slate-800 text-slate-300 text-xs font-black tracking-widest uppercase mb-4 inline-block">
                Topic Explorer
            </span>
            <h1 class="text-5xl font-black text-white mb-4">
                Explore <span class="text-blue-400">{{ $displayTopic }}</span>
            </h1>
            <p class="text-lg text-slate-400 mb-8">
                Dive into the latest masterpieces shaping the world of {{ $displayTopic }}.
            </p>
        </div>
    </header>

    <main class="flex-1 max-w-7xl mx-auto px-6 py-16 w-full">
        <div class="mb-10 border-b border-slate-200 pb-4">
            <h2 class="text-2xl font-black text-slate-800">{{ $posts->count() }} Publications Found</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($posts as $post)
                <a href="{{ route('posts.show', $post->id) }}" class="group bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all flex flex-col">
                    
                    <div class="aspect-video bg-slate-100 relative overflow-hidden">
                        @if($post->image_path)
                            <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-4xl opacity-50 bg-slate-200">📝</div>
                        @endif
                    </div>
                    
                    <div class="p-6 flex flex-col flex-1">
                        <span class="text-xs font-black text-blue-500 uppercase tracking-widest mb-2">{{ $post->tags ?? 'Article' }}</span>
                        <h3 class="text-xl font-black text-slate-900 mb-2 group-hover:text-blue-600 transition-colors">
                            {{ $post->title }}
                        </h3>
                        <p class="text-sm text-slate-500 mb-6 line-clamp-3 flex-1">
                            {{ $post->excerpt ?? Str::limit(strip_tags($post->body), 100) }}
                        </p>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-slate-100 mt-auto">
                            
                            <div onclick="event.preventDefault(); window.location.href='{{ route('creator.show', $post->user->id) }}';" class="flex items-center space-x-2 z-10 cursor-pointer hover:text-blue-600">
                                <span class="w-6 h-6 bg-slate-800 text-white rounded-full flex items-center justify-center text-[10px]">{{ substr($post->user->name, 0, 1) }}</span>
                                <span class="text-sm font-bold text-slate-700 hover:text-blue-600">{{ $post->user->name }}</span>
                            </div>

                            <span class="text-xs font-black text-pink-500 z-10">❤️ {{ $post->likes->count() }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full py-16 bg-white rounded-3xl border-2 border-dashed border-slate-200 text-center">
                    <div class="text-5xl mb-4 opacity-50">🔭</div>
                    <h3 class="text-2xl font-black text-slate-800 mb-2">No masterpieces found</h3>
                    <p class="text-slate-500 mb-6">Be the first creator to publish an article about {{ $displayTopic }}.</p>
                    <a href="{{ route('dashboard') }}" class="px-6 py-2 bg-blue-600 text-white font-bold rounded-full hover:bg-blue-700">Write in Studio</a>
                </div>
            @endforelse
        </div>
    </main>

    @include('components.footer')

</body>
</html>