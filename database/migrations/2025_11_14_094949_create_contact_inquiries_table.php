<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contact_inquiries', function (Blueprint $table) {
            $table->id();

            $table->string('full_name');
            $table->string('email'); // email_address
            $table->string('phone_number')->nullable();

            $table->enum('service_type', [
                'home',
                'business',
                'leased_line',
                'general'
            ])->default('general');

            $table->text('message')->nullable();

            // Admin tracking
            $table->enum('status', ['pending', 'reviewed', 'resolved'])
                ->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_inquiries');
    }
};
