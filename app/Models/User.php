<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany; // Must have this!

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    // THE RELATIONSHIP ENGINE
    // Make sure this is BEFORE the very last } of the file
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
} // <--- THIS is the final bracket. The function must be ABOVE this.