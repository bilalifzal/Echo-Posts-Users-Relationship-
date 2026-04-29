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
    Schema::table('likes', function (Blueprint $table) {
        // This tells MySQL: "I don't care what you think, delete this column now."
        if (Schema::hasColumn('likes', 'post_id')) {
            $table->dropColumn('post_id');
        }
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('likes', function (Blueprint $table) {
            //
        });
    }
};
