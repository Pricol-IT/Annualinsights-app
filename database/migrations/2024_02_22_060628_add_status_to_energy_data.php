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
        Schema::table('energy_data', function (Blueprint $table) {
            $table->enum('status',['submitted','saved','approved','rejected','not proceeded'])->default('not proceeded');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('energy_data', function (Blueprint $table) {
        });
    }
};
