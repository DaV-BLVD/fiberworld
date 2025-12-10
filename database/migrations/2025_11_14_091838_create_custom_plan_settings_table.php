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
        Schema::create('custom_plan_settings', function (Blueprint $table) {
            $table->id();

            // Speed range
            $table->integer('speed_min')->default(10);
            $table->integer('speed_max')->default(500);
            $table->integer('speed_step')->default(10);

            // Data range
            $table->integer('data_min')->default(100);
            $table->integer('data_max')->default(1000);
            $table->integer('data_step')->default(50);

            // Pricing logic
            $table->decimal('price_per_mbps', 8, 2)->default(20); // e.g. NPR 20 per Mbps
            $table->decimal('price_per_gb', 8, 2)->default(2);    // NPR 2 per GB
            $table->decimal('unlimited_data_price', 8, 2)->default(500); // extra 500 for unlimited

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_plan_settings');
    }
};
