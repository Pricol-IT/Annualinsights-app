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
        Schema::create('employee_worker_benefits', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->enum('loction', ['Plant-Corporate', 'Plant-1', 'Plant-2', 'Plant-3', 'Plant-5', 'Plant-7', 'Plant-9', 'Plant-10', 'Plant-12']);
            $table->string('month');
            $table->enum('benefits', ['Health_Insurance', 'Accident_Insurance', 'Maternity_Benefits', 'Paternity_Benefits', 'Day_care_facilities', 'ESIC','WC']);
            $table->string('pe_male')->default('0');
            $table->string('pe_female')->default('0');
            $table->string('pe_remark')->nullable();
            $table->string('te_male')->default('0');
            $table->string('te_female')->default('0');
            $table->string('te_remark')->nullable();
            $table->enum('employee_status', ['submitted', 'saved', 'approved', 'rejected', 'not proceeded'])->default('not proceeded');
            $table->string('pw_male')->default('0');
            $table->string('pw_female')->default('0');
            $table->string('pw_remark')->nullable();
            $table->string('tw_male')->default('0');
            $table->string('tw_female')->default('0');
            $table->string('tw_remark')->nullable();
            $table->enum('worker_status', ['submitted', 'saved', 'approved', 'rejected', 'not proceeded'])->default('not proceeded');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_worker_benefits');
    }
};
