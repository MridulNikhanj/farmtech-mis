<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        $tables = [
            'categories',
            'crops',
            'failed_jobs',
            'farm_crops',
            'farm_leases',
            'farm_notes',
            'farm_registers',
            'farms',
            'password_resets',
            'personal_access_tokens',
            'users',
        ];
        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        }
    }

    public function down(): void
    {
        // No rollback for dropped tables
    }
}; 