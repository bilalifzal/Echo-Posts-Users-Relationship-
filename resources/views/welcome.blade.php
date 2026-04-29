<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes | The Modern Creator Network</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <style>
        .marquee-wrapper { overflow: hidden; white-space: nowrap; display: flex; width: 100%; }
        /* News Marquee (Red) */
        .news-track { display: flex; width: max-content; animation: scroll-right 25s linear infinite; }
        /* Tech Stack Marquee (Blue) */
        .marquee-track { display: flex; width: max-content; animation: scroll-left 30s linear infinite; }
        /* Flags Marquee (Dark) */
        .flags-track { display: flex; width: max-content; animation: scroll-left 20s linear infinite; }
        
        .marquee-track:hover, .news-track:hover, .flags-track:hover { animation-play-state: paused; }
        
        @keyframes scroll-left { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
        @keyframes scroll-right { 0% { transform: translateX(-50%); } 100% { transform: translateX(0); } }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans overflow-x-hidden">

    <nav class="fixed w-full z-[100] bg-white/95 backdrop-blur-xl border-b border-slate-200 shadow-sm top-nav">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-10 py-4 flex justify-between items-center">
            
            <a href="/" class="flex items-center space-x-2 group">
                <div class="text-3xl font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-teal-500">ECHOES</div>
                <span class="text-[10px] font-black bg-slate-900 text-white px-2 py-1 rounded tracking-widest uppercase hidden sm:block">Enterprise</span>
            </a>
            
            <div class="hidden lg:flex items-center space-x-8 font-black text-xs uppercase tracking-widest text-slate-500">
                <a href="#feed" class="hover:text-blue-600 transition-colors">Discover</a>
                <a href="#hot" class="hover:text-red-500 transition-colors flex items-center space-x-1"><span>🔥</span> <span>Hot Posts</span></a>
                <a href="#categories" class="hover:text-blue-600 transition-colors">Topics</a>
                <a href="#writers" class="hover:text-blue-600 transition-colors">Top Writers</a>
                <a href="#features" class="hover:text-blue-600 transition-colors">Features</a>
                <a href="#faq" class="hover:text-blue-600 transition-colors">FAQ</a>
            </div>
            
            <div class="flex items-center space-x-6 font-bold text-sm">
                @auth
                    <span class="text-slate-500 hidden xl:block">Welcome back, {{ auth()->user()->name }}</span>
                    <a href="{{ url('/dashboard') }}" class="px-6 py-2.5 bg-blue-600 text-white font-black rounded-full hover:bg-blue-700 transition-colors shadow-lg hover:shadow-blue-500/30">
                        Enter Studio
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-slate-600 hover:text-blue-600 transition-colors hidden sm:block">Sign In</a>
                    <a href="{{ route('register') }}" class="px-6 py-2.5 bg-slate-900 text-white font-black rounded-full hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                        Start Writing
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <header class="relative pt-32 pb-16 lg:pt-48 lg:pb-24 overflow-hidden flex items-center justify-center min-h-[85vh] bg-slate-900">
        <div class="absolute inset-0 z-0 opacity-40">
            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 z-0 bg-gradient-to-b from-slate-900/90 via-slate-900/70 to-slate-900"></div>
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-full max-w-4xl h-[400px] bg-gradient-to-r from-blue-500 to-teal-400 blur-[120px] -z-0 rounded-full opacity-30"></div>
        
        <div class="max-w-5xl mx-auto text-center px-6 relative z-10 hero-content">
            <span class="px-4 py-1.5 rounded-full border border-blue-500/30 bg-blue-500/10 text-blue-300 text-xs font-black tracking-widest uppercase mb-8 inline-block backdrop-blur-md shadow-[0_0_15px_rgba(59,130,246,0.3)]">
                Global Network Online
            </span>
            <h1 class="text-5xl md:text-8xl font-black text-white tracking-tight leading-[1.1] mb-6">
                Amplify your voice to a <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-teal-300">Global Audience.</span>
            </h1>
            <p class="text-xl text-slate-300 mb-10 max-w-3xl mx-auto font-medium leading-relaxed">
                The ultimate enterprise platform for elite creators. Publish masterpieces, analyze live metrics, and dominate the digital conversation worldwide.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#feed" class="px-10 py-5 bg-gradient-to-r from-blue-600 to-teal-500 text-white font-black rounded-full hover:shadow-[0_0_20px_rgba(59,130,246,0.6)] transition-all hover:-translate-y-1 w-full sm:w-auto text-lg uppercase tracking-widest">
                    Explore Masterpieces
                </a>
                @guest
                <a href="{{ route('register') }}" class="px-10 py-5 bg-white/10 text-white backdrop-blur-md border border-white/20 font-black rounded-full hover:bg-white/20 transition-all shadow-sm w-full sm:w-auto text-lg uppercase tracking-widest">
                    Join the Network
                </a>
                @endguest
            </div>
        </div>
    </header>

    <div class="bg-red-600 py-3 border-y border-red-700 shadow-xl overflow-hidden relative z-20">
        <div class="absolute left-0 top-0 bottom-0 bg-red-700 px-6 flex items-center justify-center z-10 font-black text-white tracking-widest text-sm shadow-r-lg uppercase">
            Live Pulse
        </div>
        <div class="marquee-wrapper pl-32">
            <div class="news-track flex space-x-12 items-center text-red-100 font-bold tracking-wide text-sm">
                <span class="flex items-center space-x-12">
                    <span>🏛️ <strong class="text-white">POLITICS:</strong> Global Summit 2026 reaches historic climate accord in Geneva</span>
                    <span>⚽ <strong class="text-white">SPORTS:</strong> Champions League Final breaks all-time streaming viewership records</span>
                    <span>📈 <strong class="text-white">MARKETS:</strong> Tech stocks surge as AI integration drops operating costs by 40%</span>
                    <span>💻 <strong class="text-white">TECH:</strong> Neuralink announces successful phase 3 human trials</span>
                    <span>🚀 <strong class="text-white">SPACE:</strong> Artemis IV mission prepares for deep-space lunar orbital launch</span>
                </span>
                <span class="flex items-center space-x-12">
                    <span>🏛️ <strong class="text-white">POLITICS:</strong> Global Summit 2026 reaches historic climate accord in Geneva</span>
                    <span>⚽ <strong class="text-white">SPORTS:</strong> Champions League Final breaks all-time streaming viewership records</span>
                    <span>📈 <strong class="text-white">MARKETS:</strong> Tech stocks surge as AI integration drops operating costs by 40%</span>
                    <span>💻 <strong class="text-white">TECH:</strong> Neuralink announces successful phase 3 human trials</span>
                    <span>🚀 <strong class="text-white">SPACE:</strong> Artemis IV mission prepares for deep-space lunar orbital launch</span>
                </span>
            </div>
        </div>
    </div>

    <div class="bg-slate-900 py-3 border-b border-slate-800 shadow-inner overflow-hidden relative z-10">
        <div class="absolute left-0 top-0 bottom-0 bg-black px-6 flex items-center justify-center z-10 font-black text-slate-400 tracking-widest text-xs uppercase">
            Global Reach
        </div>
        <div class="marquee-wrapper pl-32">
            <div class="flags-track flex space-x-12 items-center text-slate-300 font-bold tracking-widest text-sm uppercase">
                <span class="flex items-center space-x-12">
                    <span>🇵🇰 Pakistan</span> <span>🇺🇸 United States</span> <span>🇬🇧 United Kingdom</span> <span>🇨🇦 Canada</span> <span>🇦🇺 Australia</span> <span>🇩🇪 Germany</span> <span>🇯🇵 Japan</span> <span>🇫🇷 France</span> <span>🇮🇳 India</span> <span>🇧🇷 Brazil</span>
                </span>
                <span class="flex items-center space-x-12">
                    <span>🇵🇰 Pakistan</span> <span>🇺🇸 United States</span> <span>🇬🇧 United Kingdom</span> <span>🇨🇦 Canada</span> <span>🇦🇺 Australia</span> <span>🇩🇪 Germany</span> <span>🇯🇵 Japan</span> <span>🇫🇷 France</span> <span>🇮🇳 India</span> <span>🇧🇷 Brazil</span>
                </span>
            </div>
        </div>
    </div>

    <div class="bg-slate-50">
        <main class="max-w-7xl mx-auto px-6 lg:px-8 py-20 space-y-32">
            
            <section class="scroll-anim bg-blue-600 rounded-3xl p-10 flex flex-col md:flex-row justify-around items-center text-white shadow-xl shadow-blue-600/20">
                <div class="text-center mb-6 md:mb-0">
                    <p class="text-5xl font-black mb-2">{{ \App\Models\User::count() }}</p>
                    <p class="text-blue-200 font-bold uppercase tracking-widest text-xs">Registered Creators</p>
                </div>
                <div class="w-px h-16 bg-blue-500 hidden md:block"></div>
                <div class="text-center mb-6 md:mb-0">
                    <p class="text-5xl font-black mb-2">{{ \App\Models\Post::where('status', 'published')->count() }}</p>
                    <p class="text-blue-200 font-bold uppercase tracking-widest text-xs">Published Masterpieces</p>
                </div>
                <div class="w-px h-16 bg-blue-500 hidden md:block"></div>
                <div class="text-center">
                    <p class="text-5xl font-black mb-2">{{ \App\Models\Like::count() + \App\Models\Comment::count() }}</p>
                    <p class="text-blue-200 font-bold uppercase tracking-widest text-xs">Total Engagements</p>
                </div>
            </section>

            <section id="hot" class="scroll-anim bg-slate-900 rounded-[3rem] p-10 lg:p-14 text-white shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-96 h-96 bg-red-600 blur-[150px] rounded-full opacity-20 pointer-events-none"></div>
                
                <div class="flex justify-between items-end mb-10 relative z-10">
                    <div>
                        <h2 class="text-4xl font-black tracking-tight flex items-center space-x-3">
                            <span class="text-red-500 animate-pulse">🔥</span> <span>Trending Worldwide</span>
                        </h2>
                        <p class="text-slate-400 mt-2 font-medium text-lg">The most liked and debated masterpieces right now.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative z-10">
                    @forelse ($gridPosts->sortByDesc(function($post) { return $post->likes->count(); })->take(3) as $hotPost)
                        <a href="{{ route('posts.show', $hotPost->id) }}" class="group bg-slate-800 rounded-3xl border border-slate-700 overflow-hidden shadow-lg hover:border-red-500/50 hover:shadow-red-500/20 transition-all duration-300 flex flex-col">
                            <div class="p-6 flex flex-col flex-1">
                                <div class="flex items-center space-x-3 mb-4">
                                    <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest border border-red-500/30">Hot Topic</span>
                                    <span class="text-xs font-bold text-slate-400">{{ $hotPost->created_at->diffForHumans() }}</span>
                                </div>
                                <h3 class="text-xl font-black text-white mb-3 group-hover:text-red-400 transition-colors leading-snug line-clamp-2">
                                    {{ $hotPost->title }}
                                </h3>
                                <div class="flex items-center justify-between pt-5 mt-auto border-t border-slate-700">
                                    <span class="text-sm font-bold text-slate-300 flex items-center space-x-2">
                                        <span class="w-6 h-6 bg-slate-600 text-white rounded-full flex items-center justify-center text-[10px]">{{ substr($hotPost->user->name, 0, 1) }}</span>
                                        <span>{{ $hotPost->user->name }}</span>
                                    </span>
                                    <span class="text-sm font-black text-red-500 animate-pulse">❤️ {{ $hotPost->likes->count() }}</span>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full py-10 text-center border border-dashed border-slate-700 rounded-3xl">
                            <p class="text-slate-400">Waiting for posts to catch fire. 🔥</p>
                        </div>
                    @endforelse
                </div>
            </section>
<section id="categories" class="scroll-anim">
                <div class="flex justify-between items-end mb-10">
                    <div>
                        <h2 class="text-4xl font-black text-slate-800 tracking-tight">Explore the Network</h2>
                        <p class="text-slate-500 mt-2 font-medium text-lg">Dive into the topics shaping tomorrow.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <a href="{{ route('explore', 'politics') }}" class="group relative h-72 rounded-3xl overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1541872526830-466d7bd4dc28?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <span class="bg-red-500 text-white text-[10px] font-black uppercase tracking-widest px-2 py-1 rounded mb-2 inline-block">Trending</span>
                            <h3 class="text-2xl font-black text-white">Politics</h3>
                        </div>
                    </a>
                    <a href="{{ route('explore', 'tech') }}" class="group relative h-72 rounded-3xl overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <h3 class="text-2xl font-black text-white">Technology</h3>
                        </div>
                    </a>
                    <a href="{{ route('explore', 'sports') }}" class="group relative h-72 rounded-3xl overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <h3 class="text-2xl font-black text-white">Sports</h3>
                        </div>
                    </a>
                    <a href="{{ route('explore', 'AI') }}" class="group relative h-72 rounded-3xl overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1620712943543-bcc4688e7485?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <span class="bg-blue-500 text-white text-[10px] font-black uppercase tracking-widest px-2 py-1 rounded mb-2 inline-block">Innovation</span>
                            <h3 class="text-2xl font-black text-white">AI & ML</h3>
                        </div>
                    </a>
                </div>
            </section>
            <section id="features" class="scroll-anim">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-black text-slate-800 tracking-tight">Engineered for the Elite</h2>
                    <p class="text-slate-500 mt-3 font-medium text-lg max-w-2xl mx-auto">Echoes provides an enterprise-grade toolkit for writers who want to scale their audience and dominate their niche.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all group">
                        <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform">✍️</div>
                        <h3 class="text-xl font-black text-slate-800 mb-3">Distraction-Free Studio</h3>
                        <p class="text-slate-500 font-medium">Draft, edit, and publish using a professional WYSIWYG editor built directly into your secure dashboard.</p>
                    </div>
                    <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all group">
                        <div class="w-14 h-14 bg-pink-50 text-pink-500 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform">📊</div>
                        <h3 class="text-xl font-black text-slate-800 mb-3">Live Apex Analytics</h3>
                        <p class="text-slate-500 font-medium">Track your engagement in real-time with stunning, animated charts detailing likes, comments, and read-times.</p>
                    </div>
                    <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all group">
                        <div class="w-14 h-14 bg-teal-50 text-teal-600 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform">🔗</div>
                        <h3 class="text-xl font-black text-slate-800 mb-3">Polymorphic Network</h3>
                        <p class="text-slate-500 font-medium">Connect with other writers. Like posts, leave comments, and curate your own library of favorite content.</p>
                    </div>
                </div>
            </section>

            <div class="bg-blue-900 py-4 rounded-3xl border border-blue-800 shadow-inner overflow-hidden my-16">
                <div class="marquee-wrapper">
                    <div class="marquee-track flex space-x-16 items-center text-blue-200 font-black tracking-widest uppercase text-sm">
                        <span class="flex items-center space-x-16">
                            <span>✦ Powered by Laravel 11</span>
                            <span>✦ PHP 8.2 & MySQL</span>
                            <span>✦ Live ApexCharts</span>
                            <span>✦ Polymorphic Relations</span>
                            <span>✦ Eager Loading Engine</span>
                            <span>✦ Tailwind CSS</span>
                            <span>✦ GSAP Animations</span>
                        </span>
                        <span class="flex items-center space-x-16">
                            <span>✦ Powered by Laravel 11</span>
                            <span>✦ PHP 8.2 & MySQL</span>
                            <span>✦ Live ApexCharts</span>
                            <span>✦ Polymorphic Relations</span>
                            <span>✦ Eager Loading Engine</span>
                            <span>✦ Tailwind CSS</span>
                            <span>✦ GSAP Animations</span>
                        </span>
                    </div>
                </div>
            </div>
@if($featuredPost)
                <section class="scroll-anim pt-10 border-t border-slate-200">
                    <h2 class="text-xs font-black text-slate-400 tracking-widest uppercase mb-8 flex items-center space-x-2">
                        <span class="w-8 h-px bg-slate-300"></span><span>Featured Masterpiece</span>
                    </h2>
                    
                    <a href="{{ route('posts.show', $featuredPost->id) }}" class="group block bg-white rounded-[2.5rem] border border-slate-200 shadow-lg hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-500 overflow-hidden">
                        <div class="flex flex-col lg:flex-row">
                            <div class="w-full lg:w-3/5 bg-slate-100 relative overflow-hidden min-h-[300px] lg:min-h-[450px]">
                                @if($featuredPost->image_path)
                                    <img src="{{ asset('storage/' . $featuredPost->image_path) }}" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?q=80&w=2070&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 opacity-80">
                                @endif
                            </div>
                            
                            <div class="w-full lg:w-2/5 p-10 lg:p-12 flex flex-col justify-center">
                                <div class="flex items-center space-x-3 mb-6">
                                    <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-black uppercase tracking-widest">{{ $featuredPost->tags ?? 'Highlight' }}</span>
                                    <span class="text-sm font-bold text-slate-400">{{ $featuredPost->created_at->format('M d, Y') }}</span>
                                </div>
                                <h3 class="text-4xl font-black text-slate-900 mb-4 group-hover:text-blue-600 transition-colors leading-tight">
                                    {{ $featuredPost->title }}
                                </h3>
                                <p class="text-lg text-slate-500 mb-8 font-medium line-clamp-4">
                                    {{ $featuredPost->excerpt ?? Str::limit(strip_tags($featuredPost->body), 200) }}
                                </p>
                                
                                <div class="flex items-center justify-between pt-6 border-t border-slate-100 mt-auto">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-12 h-12 bg-slate-900 rounded-full flex items-center justify-center text-white font-black shadow-inner">
                                            {{ substr($featuredPost->user->name, 0, 1) }}
                                        </div>
                                        <div class="relative z-20">
                                            
                                            <p onclick="event.preventDefault(); window.location.href='{{ route('creator.show', $featuredPost->user->id) }}';" class="text-sm font-black text-slate-800 hover:text-blue-600 transition-colors cursor-pointer block m-0">
                                                {{ $featuredPost->user->name }}
                                            </p>
                                            
                                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-0.5">Author</p>
                                        </div>
                                    </div>
                                    <div class="flex space-x-5 text-sm font-black text-slate-400 bg-slate-50 px-4 py-2 rounded-xl">
                                        <span class="flex items-center space-x-1 text-pink-500"><span>❤️</span> <span>{{ $featuredPost->likes->count() }}</span></span>
                                        <span class="flex items-center space-x-1 text-blue-500"><span>💬</span> <span>{{ $featuredPost->comments->count() }}</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </section>
            @endif

           <section id="feed" class="scroll-anim pt-10 border-t border-slate-200">
                <h2 class="text-xs font-black text-slate-400 tracking-widest uppercase mb-8 flex items-center space-x-2">
                    <span class="w-8 h-px bg-slate-300"></span><span>Latest Publications</span>
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($gridPosts as $post)
                        <a href="{{ route('posts.show', $post->id) }}" class="group bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col">
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
                                    <span class="text-xs font-bold text-slate-400">• {{ $post->created_at->format('M d') }}</span>
                                </div>
                                <h3 class="text-2xl font-black text-slate-900 mb-3 group-hover:text-blue-600 transition-colors leading-snug line-clamp-2">
                                    {{ $post->title }}
                                </h3>
                                <p class="text-sm text-slate-500 font-medium mb-6 line-clamp-3 flex-1 leading-relaxed">
                                    {{ $post->excerpt ?? Str::limit(strip_tags($post->body), 120) }}
                                </p>
                                <div class="flex items-center justify-between pt-5 border-t border-slate-100 mt-auto">
                                    
                                    <div onclick="event.preventDefault(); window.location.href='{{ route('creator.show', $post->user->id) }}';" class="text-sm font-bold text-slate-700 flex items-center space-x-2 cursor-pointer hover:text-blue-600 transition-colors relative z-20">
                                        <span class="w-6 h-6 bg-slate-800 text-white rounded-full flex items-center justify-center text-[10px] group-hover:bg-blue-600 transition-colors">{{ substr($post->user->name, 0, 1) }}</span>
                                        <span>{{ $post->user->name }}</span>
                                    </div>

                                    <span class="text-xs font-black text-pink-500 relative z-10">❤️ {{ $post->likes->count() }}</span>
                                </div>
                            </div>
                        </a>
                    @empty
                        @if(!$featuredPost)
                            <div class="col-span-full py-20 bg-white rounded-3xl border-2 border-dashed border-slate-200 text-center">
                                <div class="text-6xl mb-4 opacity-50">🌱</div>
                                <h3 class="text-2xl font-black text-slate-800 mb-2">The canvas is blank</h3>
                                <p class="text-slate-500 font-medium mb-6">Be the first creator to publish a masterpiece.</p>
                                <a href="{{ route('register') }}" class="px-8 py-3 bg-blue-600 text-white font-bold rounded-full shadow-lg hover:bg-blue-700 transition-colors inline-block">Start Writing</a>
                            </div>
                        @endif
                    @endforelse
                </div>
            </section>
            <section id="writers" class="scroll-anim pt-16 border-t border-slate-200">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-black text-slate-800 tracking-tight">Top Elite Writers</h2>
                    <p class="text-slate-500 mt-3 font-medium text-lg">Follow the most influential voices on the network.</p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="bg-white p-6 rounded-3xl border border-slate-200 text-center shadow-sm hover:shadow-xl transition-all">
                        <img src="https://i.pravatar.cc/150?img=11" class="w-20 h-20 rounded-full mx-auto mb-4 border-4 border-slate-50">
                        <h4 class="font-black text-slate-800">Sarah Jenkins</h4>
                        <p class="text-xs text-blue-500 font-bold mb-4 uppercase">Tech Analyst</p>
                        <button class="w-full py-2 bg-slate-100 text-slate-600 font-bold rounded-xl hover:bg-slate-200">Follow</button>
                    </div>
                    <div class="bg-white p-6 rounded-3xl border border-slate-200 text-center shadow-sm hover:shadow-xl transition-all">
                        <img src="https://i.pravatar.cc/150?img=33" class="w-20 h-20 rounded-full mx-auto mb-4 border-4 border-slate-50">
                        <h4 class="font-black text-slate-800">David Ross</h4>
                        <p class="text-xs text-blue-500 font-bold mb-4 uppercase">Political Editor</p>
                        <button class="w-full py-2 bg-slate-100 text-slate-600 font-bold rounded-xl hover:bg-slate-200">Follow</button>
                    </div>
                    <div class="bg-white p-6 rounded-3xl border border-slate-200 text-center shadow-sm hover:shadow-xl transition-all">
                        <img src="https://i.pravatar.cc/150?img=47" class="w-20 h-20 rounded-full mx-auto mb-4 border-4 border-slate-50">
                        <h4 class="font-black text-slate-800">Elena Miles</h4>
                        <p class="text-xs text-blue-500 font-bold mb-4 uppercase">AI Researcher</p>
                        <button class="w-full py-2 bg-slate-100 text-slate-600 font-bold rounded-xl hover:bg-slate-200">Follow</button>
                    </div>
                    <div class="bg-white p-6 rounded-3xl border border-slate-200 text-center shadow-sm hover:shadow-xl transition-all">
                        <img src="https://i.pravatar.cc/150?img=12" class="w-20 h-20 rounded-full mx-auto mb-4 border-4 border-slate-50">
                        <h4 class="font-black text-slate-800">Marcus Chen</h4>
                        <p class="text-xs text-blue-500 font-bold mb-4 uppercase">Sports Columnist</p>
                        <button class="w-full py-2 bg-slate-100 text-slate-600 font-bold rounded-xl hover:bg-slate-200">Follow</button>
                    </div>
                </div>
            </section>

            <section class="scroll-anim bg-indigo-50 rounded-[3rem] p-10 lg:p-16 border border-indigo-100 mt-16">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-black text-slate-800 tracking-tight">Wall of Love</h2>
                    <p class="text-indigo-500 mt-3 font-bold uppercase tracking-widest text-sm">What creators are saying</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-3xl shadow-sm relative">
                        <span class="text-4xl absolute top-4 right-6 opacity-20">"</span>
                        <p class="text-slate-600 font-medium mb-6">"Switching to Echoes was the best decision for my publication. The analytics dashboard is incredible."</p>
                        <p class="font-black text-slate-800">- Jane Doe</p>
                    </div>
                    <div class="bg-white p-8 rounded-3xl shadow-sm relative">
                        <span class="text-4xl absolute top-4 right-6 opacity-20">"</span>
                        <p class="text-slate-600 font-medium mb-6">"The cleanest UI I've ever used. The WYSIWYG editor makes drafting posts an absolute joy."</p>
                        <p class="font-black text-slate-800">- Michael Smith</p>
                    </div>
                    <div class="bg-white p-8 rounded-3xl shadow-sm relative">
                        <span class="text-4xl absolute top-4 right-6 opacity-20">"</span>
                        <p class="text-slate-600 font-medium mb-6">"The polymorphic commenting system helped me build a community around my articles instantly."</p>
                        <p class="font-black text-slate-800">- Sarah Connor</p>
                    </div>
                </div>
            </section>

            <section id="faq" class="scroll-anim pt-16 max-w-3xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-black text-slate-800 tracking-tight">Frequently Asked Questions</h2>
                </div>
                <div class="space-y-4">
                    <div class="bg-white border border-slate-200 rounded-2xl p-6">
                        <h4 class="font-black text-slate-800 text-lg">Is Echoes free to use?</h4>
                        <p class="text-slate-500 mt-2 font-medium">Yes! The core creator studio, publishing tools, and basic analytics are 100% free forever.</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-2xl p-6">
                        <h4 class="font-black text-slate-800 text-lg">Who owns my content?</h4>
                        <p class="text-slate-500 mt-2 font-medium">You do. We believe creators should always maintain 100% ownership and copyright of their work.</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-2xl p-6">
                        <h4 class="font-black text-slate-800 text-lg">Can I export my analytics?</h4>
                        <p class="text-slate-500 mt-2 font-medium">Absolutely. Enterprise users can export their Live ApexCharts data in CSV format at any time.</p>
                    </div>
                </div>
            </section>

            <section class="scroll-anim pt-16">
                <div class="bg-white border border-slate-200 rounded-[3rem] p-10 text-center shadow-lg mb-12 max-w-4xl mx-auto">
                    <h3 class="text-2xl font-black text-slate-800 mb-3">Join the Global Newsletter</h3>
                    <p class="text-slate-500 mb-8 font-medium">Get the top 5 trending masterpieces delivered to your inbox every Friday.</p>
                    <div class="flex max-w-md mx-auto">
                        <input type="email" placeholder="Enter your email address" class="w-full bg-slate-50 border border-slate-200 rounded-l-full px-6 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button class="bg-slate-900 text-white font-black px-8 py-4 rounded-r-full hover:bg-slate-800 transition-colors">Subscribe</button>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[3rem] p-12 lg:p-20 text-center text-white shadow-2xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                    <div class="relative z-10">
                        <h2 class="text-4xl md:text-5xl font-black mb-6">Ready to share your voice?</h2>
                        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-10 font-medium">Join thousands of writers, thinkers, and tech enthusiasts building their audience on the Echoes network today.</p>
                        <a href="{{ route('register') }}" class="px-10 py-5 bg-white text-blue-700 font-black rounded-full hover:shadow-xl hover:shadow-white/20 hover:-translate-y-1 transition-all inline-block text-lg uppercase tracking-widest">
                            Create Your Free Studio Account
                        </a>
                    </div>
                </div>
            </section>

            <section class="scroll-anim bg-slate-900 rounded-[3rem] p-10 lg:p-16 text-white relative overflow-hidden shadow-2xl">
                <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500 blur-[100px] rounded-full opacity-30"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-teal-500 blur-[100px] rounded-full opacity-30"></div>
                
                <div class="relative z-10 flex flex-col md:flex-row items-center md:space-x-12">
                    <div class="w-40 h-40 md:w-56 md:h-56 bg-gradient-to-tr from-blue-500 to-teal-400 rounded-full flex-shrink-0 mb-8 md:mb-0 border-4 border-slate-800 flex items-center justify-center shadow-2xl">
                        <span class="text-6xl font-black">MB</span>
                    </div>
                    
                    <div>
                        <h2 class="text-xs font-black text-blue-400 tracking-widest uppercase mb-3">Meet the Architect</h2>
                        <h3 class="text-4xl md:text-5xl font-black mb-4">Muhammad Bilal Ifzal</h3>
                        <p class="text-lg text-slate-300 font-medium leading-relaxed max-w-2xl mb-6">
                            Computer Science student at the University of Agriculture, Faisalabad (6th Semester). Proficient in HTML, CSS, JavaScript, PHP, MySQL, and mastering the Laravel framework to transition into full-stack development and future AI/ML engineering.
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <span class="px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-sm font-bold">Laravel 11 Expert</span>
                            <span class="px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-sm font-bold">Full-Stack Dev</span>
                            <span class="px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-sm font-bold">AI/ML Enthusiast</span>
                        </div>
                    </div>
                </div>
            </section>

        </main>
    </div>

    @include('components.footer')

    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            gsap.registerPlugin(ScrollTrigger);

            gsap.from(".top-nav", { y: -100, opacity: 0, duration: 1, ease: "power4.out" });
            gsap.from(".hero-content span", { y: 20, opacity: 0, duration: 1, delay: 0.2, ease: "power3.out" });
            gsap.from(".hero-content h1", { y: 30, opacity: 0, duration: 1, delay: 0.4, ease: "power3.out" });
            gsap.from(".hero-content p", { y: 20, opacity: 0, duration: 1, delay: 0.6, ease: "power3.out" });
            gsap.from(".hero-content div", { y: 20, opacity: 0, duration: 1, delay: 0.8, ease: "power3.out" });

            gsap.utils.toArray('.scroll-anim').forEach(section => {
                gsap.from(section, {
                    scrollTrigger: {
                        trigger: section,
                        start: "top 85%",
                        toggleActions: "play none none reverse"
                    },
                    y: 60,
                    opacity: 0,
                    duration: 1,
                    ease: "power3.out"
                });
            });
        });
    </script>
</body>
</html>