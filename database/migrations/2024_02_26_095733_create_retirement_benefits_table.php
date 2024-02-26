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
        Schema::create('retirement_benefits', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->enum('loction',['Plant-Corporate','Plant-1','Plant-2','Plant-3','Plant-5','Plant-7','Plant-9','Plant-10','Plant-12']);
            $table->string('month');
            $table->enum('benefits',['PF',
            'Gratuity',
            'ESI']);
            $table->string('total_employees')->default('0');
            $table->string('total_workers')->default('0');
            $table->string('remarks')->nullable();
            $table->enum('status',['submitted','saved','approved','rejected','not proceeded'])->default('not proceeded');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retirement_benefits');
    }
};
