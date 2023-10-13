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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id')
                ->constrained('merchants')
                ->cascadeOnDelete();
            $table->string('address');
            $table->string('schedule');
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
