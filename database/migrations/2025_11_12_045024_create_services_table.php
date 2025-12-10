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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->string('name'); // e.g., "Home Internet", "Business Internet"
            $table->string('slug')->unique(); // For clean URLs like /services/home-internet
            $table->string('hero_image_url')->nullable(); // URL for the hero background image
            $table->string('hero_heading'); // e.g., "Blazing-Fast Home Internet..."
            $table->text('hero_subtitle')->nullable(); // e.g., "Stream, game, work..."
            $table->string('icon_class')->nullable()->comment('e.g., bi bi-house-door-fill for section icons'); // Used for service cards on homepage
            $table->text('short_description')->nullable(); // Description for service cards on homepage
            $table->longText('full_description')->nullable(); // Detailed content for the dedicated service page
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0); // To order services in navigation or listings

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
