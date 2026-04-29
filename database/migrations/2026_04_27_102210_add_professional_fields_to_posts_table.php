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
    Schema::table('posts', function (Blueprint $table) {
        // Adding the missing columns the UI needs
        $table->string('status')->default('published')->after('body');
        $table->string('visibility')->default('public')->after('status');
        $table->string('tags')->nullable()->after('visibility');
        $table->text('excerpt')->nullable()->after('tags');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
};
