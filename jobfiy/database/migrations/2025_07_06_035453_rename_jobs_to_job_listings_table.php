<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('jobs', 'job_listings');
    }

    public function down(): void
    {
        Schema::rename('job_listings', 'jobs');
    }
};
