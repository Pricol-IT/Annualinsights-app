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
        Schema::table('water_management', function (Blueprint $table) {
            $table->string('totalwatergenerated');
            $table->enum('watergenerated_unit',['Litres','Kg'])->nullable()->change();
            $table->enum('wastegenerated_unit',['Litres','Kg'])->nullable()->change();
            $table->string('conservation_method')->nullable()->change();
            $table->enum('conserved_unit',['Litres','Kg'])->nullable()->change();
            $table->string('disposal_method')->nullable()->change();
            $table->enum('discharged_unit',['Litres','Kg'])->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('water_management', function (Blueprint $table) {
            $table->enum('watergenerated_unit',['Litres','Kg'])->change();
            $table->enum('wastegenerated_unit',['Litres','Kg'])->change();
            $table->string('conservation_method')->change();
            $table->enum('conserved_unit',['Litres','Kg'])->change();
            $table->string('disposal_method')->change();
            $table->enum('discharged_unit',['Litres','Kg'])->change();
        });
    }
};
