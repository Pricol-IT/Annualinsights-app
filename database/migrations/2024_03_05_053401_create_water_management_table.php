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
        Schema::create('water_management', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->enum('loction', ['Plant-Corporate', 'Plant-1', 'Plant-2', 'Plant-3', 'Plant-5', 'Plant-7', 'Plant-9', 'Plant-10', 'Plant-12']);
            $table->string('month');
            $table->string('watersource');
            $table->string('watersource_other')->nullable();
            $table->string('watergenerated');
            $table->enum('watergenerated_unit',['Litres','Kg']);
            $table->string('wastegenerated');
            $table->enum('wastegenerated_unit',['Litres','Kg']);
            $table->string('conservation_method');
            $table->string('conservation_other')->nullable();
            $table->string('conserved');
            $table->enum('conserved_unit',['Litres','Kg']);
            $table->string('disposal_method');
            $table->string('disposal_other')->nullable();
            $table->string('discharged');
            $table->enum('discharged_unit',['Litres','Kg']);
            $table->enum('status',['submitted','saved','approved','rejected','not proceeded'])->default('not proceeded');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('water_management');
    }
};
