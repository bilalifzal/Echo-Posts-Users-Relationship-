<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Post $post)
    {
        $user = auth()->user();

        // Check if user already liked it
        $like = $post->likes()->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
        } else {
            // This is the clean, modern way to create a polymorphic like
            $post->likes()->create([
                'user_id' => $user->id
            ]);
        }

        return back();
    }
}