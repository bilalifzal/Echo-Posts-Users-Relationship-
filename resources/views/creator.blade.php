<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes | {{ $user->name }}'s Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans overflow-x-hidden flex flex-col min-h-screen">

    <nav class="fixed w-full z-[100] bg-white/95 backdrop-blur-xl border-b border-slate-200 shadow-sm top-nav">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-10 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center space-x-2 group">
                <div class="text-3xl font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-teal-500">&larr; ECHOES</div>
            </a>
            <div class="flex items-center space-x-6 font-bold text-sm">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-6 py-2.5 bg-blue-600 text-white font-black rounded-full hover:bg-blue-700 transition-colors shadow-lg">Studio</a>
                @else
                    <a href="{{ route('register') }}" class="px-6 py-2.5 bg-slate-900 text-white font-black rounded-full hover:shadow-lg hover:-translate-y-0.5 transition-all">Start Writing</a>
                @endauth
            </div>
        </div>
    </nav>

    <header class="relative pt-32 pb-24 bg-slate-900 overflow-hidden">
        <div class="absolute inset-0 opacity-40 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-600 rounded-full blur-[150px] opacity-30 transform translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-teal-500 rounded-full blur-[150px] opacity-20 transform -translate-x-1/2 translate-y-1/2"></div>

        <div class="max-w-5xl mx-auto px-6 relative z-10 flex flex-col items-center text-center hero-anim">
            <div class="w-32 h-32 md:w-40 md:h-40 bg-gradient-to-tr from-blue-500 to-teal-400 rounded-full flex items-center justify-center text-white text-5xl font-black border-4 border-slate-900 shadow-2xl mb-6">
                {{ substr($user->name, 0, 1) }}
            </div>
            
            <h1 class="text-4xl md:text-6xl font-black text-white mb-3 tracking-tight">{{ $user->name }}</h1>
            <p class="text-blue-400 font-bold tracking-widest uppercase text-sm mb-8">Echoes Verified Creator</p>
            
            <div class="flex items-center justify-center space-x-4 md:space-x-8 bg-white/10 backdrop-blur-md border border-white/20 rounded-3xl p-6 shadow-xl">
                <div class="text-center px-4">
                    <p class="text-3xl font-black text-white">{{ $posts->count() }}</p>
                    <p class="text-xs text-slate-300 font-bold uppercase tracking-wider mt-1">Masterpieces</p>
                </div>
                <div class="w-px h-10 bg-white/20"></div>
                <div class="text-center px-4">
                    <p class="text-3xl font-black text-pink-400">{{ $totalLikes }}</p>
                    <p class="text-xs text-slate-300 font-bold uppercase tracking-wider mt-1">Total Likes</p>
                </div>
                <div class="w-px h-10 bg-white/20"></div>
                <div class="text-center px-4">
                    <p class="text-3xl font-black text-teal-400">{{ $totalComments }}</p>
                    <p class="text-xs text-slate-300 font-bold uppercase tracking-wider mt-1">Discussions</p>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1 max-w-7xl mx-auto px-6 lg:px-8 py-20 w-full">
        <div class="flex items-center justify-between mb-12 scroll-anim">
            <h2 class="text-3xl font-black text-slate-800 tracking-tight">Published Masterpieces</h2>
            <span class="bg-slate-200 text-slate-600 px-4 py-2 rounded-xl text-sm font-bold">Sorted by Newest</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($posts as $post)
                <a href="{{ route('posts.show', $post->id) }}" class="scroll-anim group bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col">
                    <div class="aspect-video bg-slate-100 overflow-hidden relative">
                        @if($post->image_path)
                            <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-slate-200 text-4xl opacity-50">📝</div>
                        @endif
                    </div>
                    
                    <div class="p-8 flex flex-col flex-1">
                        <div class="flex items-center space-x-3 mb-4">
                            <span class="text-xs font-black text-blue-500 uppercase tracking-widest">{{ $post->tags ?? 'Article' }}</span>
                            <span class="text-xs font-bold text-slate-400">• {{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 mb-3 group-hover:text-blue-600 transition-colors leading-snug line-clamp-2">
                            {{ $post->title }}
                        </h3>
                        <p class="text-sm text-slate-500 font-medium mb-6 line-clamp-3 flex-1 leading-relaxed">
                            {{ $post->excerpt ?? Str::limit(strip_tags($post->body), 120) }}
                        </p>
                        <div class="flex items-center justify-between pt-5 border-t border-slate-100">
                            <span class="text-xs font-black text-slate-400">Read Article &rarr;</span>
                            <span class="text-xs font-black text-pink-500">❤️ {{ $post->likes->count() }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full py-20 bg-white rounded-3xl border-2 border-dashed border-slate-200 text-center scroll-anim">
                    <div class="text-5xl mb-4 opacity-50">📭</div>
                    <h3 class="text-2xl font-black text-slate-800 mb-2">No publications yet</h3>
                    <p class="text-slate-500 font-medium">{{ $user->name }} is still drafting their first masterpiece.</p>
                </div>
            @endforelse
        </div>
    </main>

    @include('components.footer')

    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            gsap.registerPlugin(ScrollTrigger);
            gsap.from(".top-nav", { y: -100, opacity: 0, duration: 1, ease: "power4.out" });
            gsap.from(".hero-anim > div, .hero-anim > h1, .hero-anim > p, .hero-anim > div.flex", { y: 30, opacity: 0, duration: 0.8, stagger: 0.1, ease: "power3.out" });
            
            gsap.utils.toArray('.scroll-anim').forEach(section => {
                gsap.from(section, {
                    scrollTrigger: { trigger: section, start: "top 85%", toggleActions: "play none none reverse" },
                    y: 40, opacity: 0, duration: 0.8, ease: "power3.out"
                });
            });
        });
    </script>
</body>
</html>