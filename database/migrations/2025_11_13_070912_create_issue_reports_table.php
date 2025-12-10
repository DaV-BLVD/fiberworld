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
        Schema::create('issue_reports', function (Blueprint $table) {
            $table->id(); // Primary key

            $table->string('full_name'); // Full Name (required)
            $table->string('contact_number'); // Contact Number (required)
            $table->string('email')->nullable(); // Email Address (optional)
            $table->string('service_id')->nullable(); // Service ID / Account Number (optional)

            // Issue type as enum to limit options
            $table->enum('issue_type', [
                'no-internet',
                'slow-speed',
                'intermittent-connection',
                'wifi-problem',
                'billing-issue',
                'other'
            ]);

            $table->text('issue_description'); // Detailed issue description

            $table->boolean('is_resolved')->default(false); // Track if the issue is resolved (admin can update)

            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issue_reports');
    }
};
