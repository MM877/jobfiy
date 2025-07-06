<?php

use App\Models\Employer;
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
    Schema::table('jobs', function (Blueprint $table) {
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->string('address')->nullable();
        $table->string('country')->nullable();
        $table->boolean('is_remote')->default(false);
        $table->text('description')->nullable();
    });
}

public function down(): void
{
    Schema::table('jobs', function (Blueprint $table) {
        $table->dropColumn(['email', 'phone', 'address', 'country', 'is_remote', 'description']);
    });
}

};
