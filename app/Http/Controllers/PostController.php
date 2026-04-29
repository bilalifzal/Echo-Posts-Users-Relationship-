<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // The Store Engine
    public function store(Request $request)
    {
        // 1. Validation
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|string',
            'visibility' => 'required|string',
            'tags' => 'nullable|string',
            'excerpt' => 'nullable|string',
        ]);

        // 2. Handle Image Upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        // 3. Save to database (Corrected Syntax)
        $request->user()->posts()->create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'image_path' => $imagePath,
            'status' => $validated['status'],
            'visibility' => $validated['visibility'],
            'tags' => $validated['tags'] ?? null,
            'excerpt' => $validated['excerpt'] ?? null,
        ]);

        return redirect()->route('dashboard')->with('success', 'Masterpiece published!');
    }

    // The Delete Engine
    public function destroy(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        $post->delete();
        return back()->with('success', 'Post deleted.');
    }


    // LOAD THE EDIT PAGE
    public function edit(Post $post)
    {
        // Security: Only the owner can edit
        if ($post->user_id !== auth()->id()) abort(403);
        
        return view('edit', compact('post'));
    }

    // SAVE THE CHANGES
    public function update(Request $request, Post $post)
    {
        // Security
        if ($post->user_id !== auth()->id()) abort(403);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|string',
            'visibility' => 'required|string',
            'tags' => 'nullable|string',
            'excerpt' => 'nullable|string',
        ]);

        // Handle Image Replacement safely
        if ($request->hasFile('image')) {
            if ($post->image_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($post->image_path);
            }
            $post->image_path = $request->file('image')->store('posts', 'public');
        }

        // Update the rest of the data
        $post->update([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'status' => $validated['status'],
            'visibility' => $validated['visibility'],
            'tags' => $validated['tags'] ?? null,
            'excerpt' => $validated['excerpt'] ?? null,
        ]);

        return redirect()->route('studio.blogs')->with('success', 'Masterpiece updated successfully!');
    }
}