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
        Schema::create('parental_leaves', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->enum('loction',['Plant-Corporate','Plant-1','Plant-2','Plant-3','Plant-5','Plant-7','Plant-9','Plant-10','Plant-12']);
            $table->string('month');
            $table->enum('benefits',['Entitled_to_Parental_Leave',
            'Took_Parental_Leave',
            'Returned_to_Work_Post_Leave',
            'Still_Employed_12_Months_Later',
            'Due_to_Return_Soon',
            'Returns_from_Prior_Periods']);
            $table->string('em_male')->default('0');
            $table->string('em_female')->default('0');
            $table->string('wr_male')->default('0');
            $table->string('wr_female')->default('0');
            $table->enum('status',['submitted','saved','approved','rejected','not proceeded'])->default('not proceeded');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parental_leaves');
    }
};
