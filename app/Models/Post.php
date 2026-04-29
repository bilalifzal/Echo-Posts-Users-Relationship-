<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany; // 1. Add this import!

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'image_path', 'status', 'visibility', 'tags', 'excerpt'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 2. THE PROPER POLYMORPHIC LINK FOR LIKES
  // THE FIX: Upgrade to Polymorphic
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    // 3. THE PROPER POLYMORPHIC LINK FOR COMMENTS
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}