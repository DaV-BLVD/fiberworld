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
        Schema::create('why_fiber_world_dedicated_leased_line', function (Blueprint $table) {
            $table->id();

            $table->string('icon');
            $table->string('title');
            $table->string('description');
            $table->boolean('is_active');
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_fiber_world_dedicated_leased_line');
    }
};
