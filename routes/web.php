<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// ==========================================
// THE PUBLIC READER & ENGAGEMENT ENGINE
// ==========================================

// 1. View the Single Post
Route::get('/article/{post}', function (\App\Models\Post $post) {
    // Security: Only show if published and public
    if ($post->status !== 'published' || $post->visibility !== 'public') {
        abort(404);
    }
    // Eager load everything we need
    $post->load(['user', 'comments.user', 'likes']);
    return view('show', compact('post'));
})->name('posts.show');

// 2. Post a Comment (Requires Login)
Route::post('/article/{post}/comment', function (\Illuminate\Http\Request $request, \App\Models\Post $post) {
    $request->validate(['body' => 'required|string|max:1000']);
    
    // Save the comment using the Polymorphic relationship
    $post->comments()->create([
        'user_id' => auth()->id(),
        'body' => $request->body,
    ]);
    
    return back()->with('success', 'Comment added to the discussion!');
})->middleware(['auth', 'verified'])->name('comments.store');

// THE DASHBOARD
Route::get('/dashboard', function () {
    $posts = Post::with('user')->latest()->get(); 
    return view('dashboard', compact('posts'));
})->middleware(['auth', 'verified'])->name('dashboard');

// THE SECURE ZONE
Route::middleware('auth')->group(function () {
    // Default Breeze Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // YOUR CUSTOM ECHOES ROUTES (These were missing!)
    Route::post('/memories', [PostController::class, 'store'])->name('posts.store');
    Route::post('/posts/{post}/like', [LikeController::class, 'toggleLike'])->name('posts.like');
});
// THE CONTENT MANAGER (All Blogs)
// THE CONTENT MANAGER (All Blogs)
Route::get('/studio/blogs', function () {
    // Smart Work: Eager load the relationships so our modals can show WHO liked and commented
    $myPosts = \App\Models\Post::with(['likes.user', 'comments.user'])
                ->where('user_id', auth()->id())
                ->latest()
                ->get(); 
    return view('blogs', compact('myPosts'));
})->middleware(['auth', 'verified'])->name('studio.blogs');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update'); // ADD THIS LINE
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');





// THE DRAFTS MANAGER
Route::get('/studio/drafts', function () {
    // Smart Work: Only fetch posts for THIS user where status is 'draft'
    $drafts = \App\Models\Post::where('user_id', auth()->id())
                ->where('status', 'draft')
                ->latest()
                ->get(); 
    return view('drafts', compact('drafts'));
})->middleware(['auth', 'verified'])->name('studio.drafts');



// THE LIKED POSTS MANAGER
Route::get('/studio/liked', function () {
    // Fetch likes by the user, specifically for Posts, and eager load the Post and Author
    $likes = \App\Models\Like::where('user_id', auth()->id())
                ->where('likeable_type', \App\Models\Post::class)
                ->with('likeable.user') 
                ->latest()
                ->get();
    
    // Extract the actual posts from the likes collection
    $likedPosts = $likes->map->likeable->filter();
    
    return view('liked', compact('likedPosts'));
})->middleware(['auth', 'verified'])->name('studio.liked');






// THE COMMENTS MANAGER
Route::get('/studio/comments', function () {
    // Fetch user's comments and eager load the post they belong to
    $myComments = \App\Models\Comment::where('user_id', auth()->id())
                ->with('commentable')
                ->latest()
                ->get();
    return view('comments', compact('myComments'));
})->middleware(['auth', 'verified'])->name('studio.comments');

// DELETE COMMENT ROUTE
Route::delete('/comments/{comment}', function (\App\Models\Comment $comment) {
    if ($comment->user_id === auth()->id()) {
        $comment->delete();
    }
    return back();
})->middleware(['auth', 'verified'])->name('comments.destroy');




// THE ANALYTICS DASHBOARD
Route::get('/studio/analytics', function () {
    $user = auth()->user();
    
    // Fetch all posts with their exact like and comment counts
    $posts = \App\Models\Post::where('user_id', $user->id)
                ->withCount(['likes', 'comments'])
                ->latest()
                ->get();

    // 1. Aggregate Stats
    $totalPosts = $posts->count();
    $totalLikes = $posts->sum('likes_count');
    $totalComments = $posts->sum('comments_count');
    
    // Calculate Total Words Written across all posts
    $totalWords = $posts->sum(function($post) {
        return str_word_count(strip_tags($post->body));
    });

    // 2. Data for the Animated Chart (Top 7 Recent Posts)
    $chartData = $posts->take(7)->reverse()->map(function($post) {
        return [
            'title' => \Illuminate\Support\Str::limit($post->title, 15),
            'likes' => $post->likes_count,
            'comments' => $post->comments_count
        ];
    })->values();

    return view('analytics', compact('posts', 'totalPosts', 'totalLikes', 'totalComments', 'totalWords', 'chartData'));
})->middleware(['auth', 'verified'])->name('studio.analytics');





// THE UPGRADED ANALYTICS DASHBOARD
Route::get('/studio/analytics', function () {
    $user = auth()->user();
    
    // Fetch all posts with their exact like and comment counts
    $posts = \App\Models\Post::where('user_id', $user->id)
                ->withCount(['likes', 'comments'])
                ->latest()
                ->get();

    // 1. Core Aggregate Stats
    $totalPosts = $posts->count();
    $totalLikes = $posts->sum('likes_count');
    $totalComments = $posts->sum('comments_count');
    
    // 2. NEW: Advanced Metrics
    $totalEngagement = $totalLikes + $totalComments;
    $totalWords = $posts->sum(function($post) {
        return str_word_count(strip_tags($post->body));
    });
    $avgWords = $totalPosts > 0 ? round($totalWords / $totalPosts) : 0;
    // Assuming average reading speed of 200 words per minute
    $avgReadTime = ceil($avgWords / 200);

    // 3. Data for the Animated Area Chart (Top 7 Recent Posts)
    $chartData = $posts->take(7)->reverse()->map(function($post) {
        return [
            'title' => \Illuminate\Support\Str::limit($post->title, 15),
            'likes' => $post->likes_count,
            'comments' => $post->comments_count
        ];
    })->values();

    return view('analytics', compact(
        'posts', 'totalPosts', 'totalLikes', 'totalComments', 
        'totalEngagement', 'totalWords', 'avgReadTime', 'chartData'
    ));
})->middleware(['auth', 'verified'])->name('studio.analytics');



// THE PUBLIC LANDING PAGE
Route::get('/', function () {
    // Fetch only published posts, eager load the author, likes, and comments
    $publishedPosts = \App\Models\Post::with(['user', 'likes', 'comments'])
                        ->where('status', 'published')
                        ->where('visibility', 'public')
                        ->latest()
                        ->get();

    // Split the data: 1 for the massive Featured Hero, the rest for the Grid
    $featuredPost = $publishedPosts->first();
    $gridPosts = $publishedPosts->skip(1);

    return view('welcome', compact('featuredPost', 'gridPosts'));
})->name('home');


// ==========================================
// THE PUBLIC CREATOR PROFILE
// ==========================================
Route::get('/creator/{user}', function (\App\Models\User $user) {
    // 1. Fetch only the published public posts for this specific user
    $posts = $user->posts()
                  ->where('status', 'published')
                  ->where('visibility', 'public')
                  ->with(['likes', 'comments']) 
                  ->latest()
                  ->get();

    // 2. Calculate their lifetime platform stats
    $totalLikes = $posts->sum(fn($post) => $post->likes->count());
    $totalComments = $posts->sum(fn($post) => $post->comments->count());

    return view('creator', compact('user', 'posts', 'totalLikes', 'totalComments'));
})->name('creator.show');








// ==========================================
// THE CATEGORY DISCOVERY ENGINE
// ==========================================
Route::get('/explore/{topic}', function ($topic) {
    // Format the topic for the UI (e.g., 'tech' becomes 'Tech')
    $displayTopic = ucfirst($topic);

    // Search the database for published, public posts matching this tag
    $posts = \App\Models\Post::where('status', 'published')
                ->where('visibility', 'public')
                ->where('tags', 'LIKE', "%{$topic}%")
                ->with(['user', 'likes', 'comments'])
                ->latest()
                ->get();

    return view('explore', compact('posts', 'displayTopic', 'topic'));
})->name('explore');



// ==========================================
// SUPER ADMIN COMMAND CENTER
// ==========================================// ==========================================
// SUPER ADMIN COMMAND CENTER
// ==========================================
Route::prefix('admin')->middleware(['auth'])->group(function () {
    
    // 1. The Main Dashboard
    Route::get('/dashboard', function () {
        if (!auth()->user()->is_admin) abort(403, 'ACCESS DENIED: Super Admin Clearance Required.');

        $totalUsers = \App\Models\User::count();
        $totalPosts = \App\Models\Post::count();
        $totalEngagements = \App\Models\Like::count() + \App\Models\Comment::count();
        $recentUsers = \App\Models\User::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalUsers', 'totalPosts', 'totalEngagements', 'recentUsers'));
    })->name('admin.dashboard');

  Route::get('/users', function () {
        if (!auth()->user()->is_admin) abort(403);
        
    
        $users = \App\Models\User::withCount('posts')->latest()->paginate(10);
        
        return view('admin.users', compact('users'));
    })->name('admin.users');
    Route::get('/posts', function () {
        if (!auth()->user()->is_admin) abort(403);
        $posts = \App\Models\Post::with(['user', 'likes', 'comments'])->latest()->paginate(10);
        return view('admin.posts', compact('posts'));
    })->name('admin.posts');

    // BAN / UNPUBLISH POST
    Route::patch('/posts/{post}/toggle', function (\App\Models\Post $post) {
        if (!auth()->user()->is_admin) abort(403);
        
        // Flip the status from published to draft (unpublishing it)
        $post->status = $post->status === 'published' ? 'draft' : 'published';
        $post->save();
        
        return back()->with('success', 'Post visibility updated successfully.');
    })->name('admin.posts.toggle');

    // NUKE / DELETE POST
    Route::delete('/posts/{post}', function (\App\Models\Post $post) {
        if (!auth()->user()->is_admin) abort(403);
        
        $post->delete(); // Wipes it from the database
        
        return back()->with('success', 'Masterpiece deleted permanently.');
    })->name('admin.posts.destroy');// 3. Reported Content Desk (Triage)
    Route::get('/reports', function () {
        if (!auth()->user()->is_admin) abort(403);
        
        // Mocking report data to visualize the triage desk. 
        // Later, you can swap this with \App\Models\Report::latest()->get();
        $reports = collect([
            (object)['id' => 842, 'target_type' => 'Post', 'target_name' => 'The truth about...', 'reason' => 'Hate Speech / Toxicity', 'reporter' => 'Sarah J.', 'created_at' => now()->subMinutes(45)],
            (object)['id' => 843, 'target_type' => 'User', 'target_name' => '@CryptoKing99', 'reason' => 'Spam / Scam Link', 'reporter' => 'Mike T.', 'created_at' => now()->subHours(2)],
            (object)['id' => 844, 'target_type' => 'Comment', 'target_name' => 'On Post #42', 'reason' => 'Harassment', 'reporter' => 'Alex W.', 'created_at' => now()->subHours(5)],
        ]);
        
        return view('admin.reports', compact('reports'));
    })->name('admin.reports');

    // 3. Enterprise & Revenue Routes
  // 4. Enterprise & Stripe Subscriptions
    Route::get('/subscriptions', function () {
        if (!auth()->user()->is_admin) abort(403);
        
        // Mocking Stripe data for the dashboard UI
        $transactions = collect([
            (object)['id' => 'txn_982374A', 'creator' => 'Sarah Jenkins', 'plan' => 'Echoes Pro', 'amount' => 15.00, 'status' => 'succeeded', 'date' => now()->subMinutes(12)],
            (object)['id' => 'txn_982375B', 'creator' => 'Marcus Thorne', 'plan' => 'Echoes Enterprise', 'amount' => 99.00, 'status' => 'succeeded', 'date' => now()->subHours(1)],
            (object)['id' => 'txn_982376C', 'creator' => 'Elena Rodriguez', 'plan' => 'Echoes Pro', 'amount' => 15.00, 'status' => 'failed', 'date' => now()->subHours(3)],
            (object)['id' => 'txn_982377D', 'creator' => 'David Kim', 'plan' => 'Echoes Pro', 'amount' => 15.00, 'status' => 'succeeded', 'date' => now()->subHours(5)],
            (object)['id' => 'txn_982378E', 'creator' => 'TechPulse Media', 'plan' => 'Echoes Enterprise', 'amount' => 99.00, 'status' => 'succeeded', 'date' => now()->subDays(1)],
        ]);
        
        return view('admin.subscriptions', compact('transactions'));
    })->name('admin.subscriptions');// 5. Creator Payouts Engine (Stripe Connect)
    Route::get('/payouts', function () {
        if (!auth()->user()->is_admin) abort(403);
        
        // Mocking Stripe Connect payout ledger
        $payouts = collect([
            (object)['id' => 'po_001A', 'creator' => 'Sarah Jenkins', 'connect_id' => 'acct_1K2L3M', 'amount' => 450.00, 'status' => 'pending', 'due_date' => now()->addDays(2)],
            (object)['id' => 'po_002B', 'creator' => 'Marcus Thorne', 'connect_id' => 'acct_9N8B7V', 'amount' => 1250.50, 'status' => 'pending', 'due_date' => now()->addDays(2)],
            (object)['id' => 'po_003C', 'creator' => 'Elena Rodriguez', 'connect_id' => 'acct_4X5C6Z', 'amount' => 85.00, 'status' => 'processing', 'due_date' => now()],
            (object)['id' => 'po_004D', 'creator' => 'TechPulse Media', 'connect_id' => 'acct_7P6O5I', 'amount' => 3420.00, 'status' => 'paid', 'due_date' => now()->subDays(5)],
        ]);
        
        return view('admin.payouts', compact('payouts'));
    })->name('admin.payouts');

    // 4. System Routes
   // 6. Platform Configuration (System Settings)
    Route::get('/settings', function () {
        if (!auth()->user()->is_admin) abort(403);
        
        // In a real app, you would fetch these from a settings table or .env file
        return view('admin.settings');
    })->name('admin.settings');
   // 7. Database Backups & System Health
    Route::get('/backups', function () {
        if (!auth()->user()->is_admin) abort(403);
        
        $backups = collect([
            (object)['id' => 'DB_FULL_SNAPSHOT_001', 'size' => '14.2 MB', 'type' => 'Full Backup', 'status' => 'Completed', 'date' => now()->subHours(2)],
            (object)['id' => 'DB_AUTO_DAILY_SYNC', 'size' => '12.8 MB', 'type' => 'Daily Sync', 'status' => 'Completed', 'date' => now()->subDays(1)],
            (object)['id' => 'DB_SCHEMA_ONLY_V2', 'size' => '1.4 MB', 'type' => 'Schema Only', 'status' => 'Completed', 'date' => now()->subDays(5)],
        ]);
        
        return view('admin.backups', compact('backups'));
    })->name('admin.backups');

});

require __DIR__.'/auth.php';