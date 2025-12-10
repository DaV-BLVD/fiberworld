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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_id')->constrained()->onDelete('cascade'); // Link to the services table
            $table->string('name'); // e.g., "Home Starter", "Business Pro"
            $table->integer('speed_mbps');
            $table->string('speed_unit')->default('Mbps');
            $table->decimal('price', 8, 2); // e.g., 1200.00
            $table->string('currency')->default('NPR');
            $table->string('billing_period')->default('month'); // e.g., month, year
            $table->boolean('is_recommended')->default(false); // For the "Most Popular" badge
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0); // For displaying plans in a specific order within a service

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
