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
        Schema::table('custom_plan_requests', function (Blueprint $table) {
            $table->string('full_name')->after('id'); // or place where you want
        });
    }

    public function down(): void
    {
        Schema::table('custom_plan_requests', function (Blueprint $table) {
            $table->dropColumn('full_name');
        });
    }
};
