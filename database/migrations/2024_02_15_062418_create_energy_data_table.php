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
        Schema::create('energy_data', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->enum('loction',['Plant Corporate','Plant 1','Plant 2','Plant 3','Plant 5','Plant 7','Plant 9','Plant 10','Plant 12']);
            $table->string('month');
            $table->string('fuel_for_diesel_generators');
            $table->string('power_from_diesel_generators');
            $table->string('electricity');
            $table->string('power_purchase_agreement');
            $table->string('captive_power');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('energy_data');
    }
};
