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
    // do the thing 
    public function up(): void
    {
    Schema::create('jobs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('employer_id')->nullable()->nullOnDelete(); 
    $table->string('title');
    $table->string('salary');
    $table->string('employer_name')->nullable();
    $table->timestamps();
});


    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
