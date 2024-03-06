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
        Schema::create('safety_data', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->enum('loction', ['Plant-Corporate', 'Plant-1', 'Plant-2', 'Plant-3', 'Plant-5', 'Plant-7', 'Plant-9', 'Plant-10', 'Plant-12']);
            $table->string('month');
            $table->string('no_of_employee')->default('0');
            $table->string('no_of_working_day')->default('0');
            $table->string('last_date_of_accient')->default('0');
            $table->string('first_aid_cases')->default('0');
            $table->string('non_recordable_injury')->default('0');
            $table->string('recordable_injury')->default('0');
            $table->string('man_days_lost')->default('0');
            $table->string('near_miss')->default('0');
            $table->string('no_of_kaizen')->default('0');
            $table->string('ehs_training')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safety_data');
    }
};
