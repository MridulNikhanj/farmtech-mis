<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('schemes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('eligibility');
            $table->string('benefits');
            $table->string('deadline')->nullable();
            $table->string('category');
            $table->string('state');
            $table->string('apply_link')->nullable();
            $table->string('documents')->nullable();
            $table->boolean('is_trending')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('schemes');
    }
}; 