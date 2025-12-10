<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('custom_plan_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('speed');
            $table->integer('data_limit')->nullable();
            $table->boolean('unlimited_data')->default(false);
            $table->decimal('calculated_price', 10, 2);
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_plan_requests');
    }
};
