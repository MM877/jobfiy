<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add default value to employer_name in employers table.
     */
    public function up(): void
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->string('employer_name')->default('unknown')->change();
        });
    }

    /**
     * Reverse the migration.
     */
    public function down(): void
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->string('employer_name')->default(null)->change();
        });
    }
};
