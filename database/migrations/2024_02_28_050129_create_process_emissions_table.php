<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('process_emissions', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->enum('loction', ['Plant-Corporate', 'Plant-1', 'Plant-2', 'Plant-3', 'Plant-5', 'Plant-7', 'Plant-9', 'Plant-10', 'Plant-12']);
            $table->string('month');
            $table->string('processtype');
            $table->string('processtype_other')->nullable();
            $table->string('input');
            $table->string('input_total_amount');
            $table->enum('input_unit', ['Litres', 'Kg']);
            $table->string('output');
            $table->string('output_total_amount');
            $table->enum('output_unit', ['Litres', 'Kg']);
            $table->enum('status', ['submitted', 'saved', 'approved', 'rejected', 'not proceeded'])->default('not proceeded');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('process_emissions');
    }
};
