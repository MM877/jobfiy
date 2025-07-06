<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    public function up(): void
    {
        // Step 1: Ensure all null user_id values are set to 1
        DB::table('jobs')->whereNull('user_id')->update(['user_id' => 1]);

        // Step 2: Modify existing user_id column
        Schema::table('jobs', function (Blueprint $table) {
            // Drop the foreign key constraint before modifying the column
            $table->dropForeign(['user_id']);
        });

        Schema::table('jobs', function (Blueprint $table) {
            // Now change the existing column (don't redefine it)
            $table->unsignedBigInteger('user_id')->default(1)->nullable(false)->change();

            // Re-add the foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->default(null)->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }
};
