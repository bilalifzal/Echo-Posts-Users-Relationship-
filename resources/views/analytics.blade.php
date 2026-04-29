<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes | Analytics Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans flex flex-col min-h-screen">

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
                        <li><a href="/dashboard" class="flex items-center justify-between text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all"><div class="flex items-center space-x-3"><span>✍️</span> <span>Write Post</span></div></a></li>
                        <li><a href="/studio/blogs" class="flex items-center justify-between text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all"><div class="flex items-center space-x-3"><span>📚</span> <span>All Blogs</span></div></a></li>
                        <li><a href="/studio/drafts" class="flex items-center justify-between text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all"><div class="flex items-center space-x-3"><span>🗂️</span> <span>Drafts</span></div></a></li>
                        <li><a href="#" class="flex items-center justify-between text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all"><div class="flex items-center space-x-3"><span>⏳</span> <span>Scheduled</span></div></a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xs font-black text-slate-400 tracking-wider mb-4 uppercase">Network</h3>
                    <ul class="space-y-2">
                        <li><a href="/studio/liked" class="flex items-center space-x-3 text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all"><span>❤️</span> <span>Liked Posts</span></a></li>
                        <li><a href="/studio/comments" class="flex items-center justify-between text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all"><div class="flex items-center space-x-3"><span>💬</span> <span>Comments</span></div></a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xs font-black text-slate-400 tracking-wider mb-4 uppercase">Account</h3>
                    <ul class="space-y-2">
                        <li><a href="/studio/analytics" class="flex items-center space-x-3 bg-blue-50 text-blue-700 px-4 py-3 rounded-xl font-bold transition-all border border-blue-100 shadow-sm"><span>📊</span> <span>Analytics</span></a></li>
                        <li><a href="/profile" class="flex items-center space-x-3 text-slate-500 hover:bg-slate-50 hover:text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all"><span>⚙️</span> <span>Settings</span></a></li>
                    </ul>
                </div>
            </div>
        </aside>

        <main class="flex-1 ml-64 p-8 flex flex-col min-h-full">
            <div class="max-w-6xl mx-auto w-full space-y-8">

                <div class="border-b border-slate-200 pb-6 flex justify-between items-end header-anim">
                    <div>
                        <h1 class="text-4xl font-black text-slate-800 tracking-tight">Performance Analytics</h1>
                        <p class="text-slate-500 mt-2 text-lg">Live data, engagement metrics, and audience insights.</p>
                    </div>
                    <button class="px-6 py-3 bg-white border border-slate-300 text-slate-600 font-bold rounded-full shadow-sm hover:bg-slate-50 transition-all flex items-center space-x-2">
                        <span>📥</span> <span>Export Report</span>
                    </button>
                </div>

                <div class="grid grid-cols-3 gap-6 stat-cards">
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 text-7xl opacity-5">📝</div>
                        <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Masterpieces</h3>
                        <p class="text-4xl font-black text-slate-800">{{ $totalPosts }}</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 text-7xl opacity-5">🖋️</div>
                        <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Words Written</h3>
                        <p class="text-4xl font-black text-indigo-600">{{ number_format($totalWords) }}</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 text-7xl opacity-5">⏱️</div>
                        <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Avg. Read Time</h3>
                        <p class="text-4xl font-black text-amber-500">{{ $avgReadTime }} <span class="text-lg text-amber-300">min</span></p>
                    </div>
                    
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 text-7xl opacity-5">❤️</div>
                        <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Total Likes</h3>
                        <p class="text-4xl font-black text-pink-500">{{ $totalLikes }}</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 text-7xl opacity-5">💬</div>
                        <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Total Comments</h3>
                        <p class="text-4xl font-black text-blue-500">{{ $totalComments }}</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 text-7xl opacity-5">🔥</div>
                        <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Total Engagement</h3>
                        <p class="text-4xl font-black text-teal-500">{{ $totalEngagement }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-6 chart-anim">
                    <div class="col-span-2 bg-white border border-slate-200 rounded-3xl p-8 shadow-sm">
                        <h3 class="text-xl font-black text-slate-800 mb-6">Engagement Velocity (Recent)</h3>
                        <div id="engagementChart" class="w-full h-[300px]"></div>
                    </div>
                    
                    <div class="col-span-1 bg-white border border-slate-200 rounded-3xl p-8 shadow-sm flex flex-col items-center">
                        <h3 class="text-xl font-black text-slate-800 mb-6 w-full text-left">Interaction Split</h3>
                        <div id="ratioChart" class="w-full flex-1 flex items-center justify-center"></div>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden table-anim">
                    <div class="p-6 border-b border-slate-100 bg-slate-50 flex justify-between items-center">
                        <h3 class="text-lg font-black text-slate-800">Content Performance Breakdown</h3>
                        <span class="text-xs font-bold text-slate-400 bg-white px-3 py-1 rounded-md border border-slate-200">Sort by: Newest</span>
                    </div>
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white border-b border-slate-200 text-xs uppercase tracking-widest text-slate-400 font-black">
                                <th class="p-5 pl-6">Post Title</th>
                                <th class="p-5">Status</th>
                                <th class="p-5 text-center">Word Count</th>
                                <th class="p-5 text-center">Read Time</th>
                                <th class="p-5 text-center">Likes</th>
                                <th class="p-5 text-center pr-6">Comments</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($posts as $post)
                                @php
                                    $words = str_word_count(strip_tags($post->body));
                                    $time = ceil($words / 200);
                                @endphp
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="p-5 pl-6 font-bold text-slate-800 truncate max-w-xs">{{ $post->title ?? 'Untitled' }}</td>
                                    
                                    <td class="p-5">
                                        @if($post->status === 'published')
                                            <span class="bg-green-50 text-green-700 px-2 py-1 rounded text-[10px] font-black uppercase border border-green-100">Published</span>
                                        @else
                                            <span class="bg-yellow-50 text-yellow-700 px-2 py-1 rounded text-[10px] font-black uppercase border border-yellow-100">Draft</span>
                                        @endif
                                    </td>
                                    
                                    <td class="p-5 text-center font-bold text-slate-500">{{ $words }}</td>
                                    <td class="p-5 text-center font-bold text-amber-500 bg-amber-50/50">{{ $time }} min</td>
                                    <td class="p-5 text-center font-black text-pink-500">{{ $post->likes_count }}</td>
                                    <td class="p-5 text-center pr-6 font-black text-blue-500">{{ $post->comments_count }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-10 text-center text-slate-400 font-medium italic">No posts available to analyze.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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
        gsap.from(".stat-cards div", { y: 30, opacity: 0, stagger: 0.1, duration: 0.6, ease: "back.out(1.2)", delay: 0.2 });
        gsap.from(".chart-anim", { y: 30, opacity: 0, duration: 0.6, delay: 0.5 });
        gsap.from(".table-anim", { y: 30, opacity: 0, duration: 0.6, delay: 0.7 });

        document.addEventListener('DOMContentLoaded', function () {
            // 1. MAIN AREA CHART
            const rawData = @json($chartData);
            const categories = rawData.map(data => data.title);
            const likesData = rawData.map(data => data.likes);
            const commentsData = rawData.map(data => data.comments);

            var areaOptions = {
                series: [{ name: 'Likes', data: likesData }, { name: 'Comments', data: commentsData }],
                chart: { type: 'area', height: 300, fontFamily: 'Inter, sans-serif', toolbar: { show: false }, animations: { enabled: true, easing: 'easeinout', speed: 800 } },
                colors: ['#EC4899', '#3B82F6'],
                dataLabels: { enabled: false },
                stroke: { curve: 'smooth', width: 3 },
                fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.4, opacityTo: 0.05, stops: [0, 90, 100] } },
                xaxis: { categories: categories, axisBorder: { show: false }, axisTicks: { show: false }, labels: { style: { colors: '#94a3b8', fontSize: '10px', fontWeight: 600 } } },
                yaxis: { labels: { style: { colors: '#94a3b8', fontSize: '12px', fontWeight: 600 } } },
                grid: { borderColor: '#f1f5f9', strokeDashArray: 4 },
                legend: { position: 'top', horizontalAlign: 'right' },
                tooltip: { theme: 'light' }
            };
            new ApexCharts(document.querySelector("#engagementChart"), areaOptions).render();

            // 2. NEW: RATIO DONUT CHART
            var totalLikes = {{ $totalLikes }};
            var totalComments = {{ $totalComments }};
            
            // Avoid empty chart bug if there is 0 engagement
            if (totalLikes === 0 && totalComments === 0) {
                totalLikes = 1; totalComments = 1; 
            }

            var donutOptions = {
                series: [totalLikes, totalComments],
                labels: ['Total Likes', 'Total Comments'],
                chart: { type: 'donut', height: 300, fontFamily: 'Inter, sans-serif', animations: { enabled: true, dynamicAnimation: { speed: 1000 } } },
                colors: ['#EC4899', '#3B82F6'],
                plotOptions: {
                    pie: { donut: { size: '75%', labels: { show: true, name: { show: true, fontSize: '12px', fontWeight: 600, color: '#94a3b8' }, value: { show: true, fontSize: '24px', fontWeight: 900, color: '#1e293b' }, total: { show: true, showAlways: true, label: 'Engagement', fontSize: '10px', color: '#94a3b8' } } } }
                },
                dataLabels: { enabled: false },
                stroke: { width: 0 },
                legend: { show: false },
                tooltip: { theme: 'light' }
            };
            new ApexCharts(document.querySelector("#ratioChart"), donutOptions).render();
        });
    </script>
</body>
</html>