<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        // The Smart Work: This connects the post to a user. 
        // cascadeOnDelete() means if a user deletes their account, their posts vanish automatically!
        $table->foreignId('user_id')->constrained()->cascadeOnDelete(); 
        
        $table->string('title')->nullable(); // Optional title
        $table->text('body'); // The actual memory/blog
        $table->string('image_path')->nullable(); // For uploaded photos
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
