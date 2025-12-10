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
        Schema::create('about_intro_paragraphs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_intro_id')->constrained('about_intro')->onDelete('cascade');
            $table->text('paragraph');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /*
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_intro_paragraphs');
    }
};
