<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('custom_plan_settings', function (Blueprint $table) {
            $table->boolean('is_active')->default(false)->after('unlimited_data_price');
        });
    }

    public function down()
    {
        Schema::table('custom_plan_settings', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
};
