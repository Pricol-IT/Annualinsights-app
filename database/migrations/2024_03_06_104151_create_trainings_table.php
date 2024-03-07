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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->enum('loction', ['Plant-Corporate', 'Plant-1', 'Plant-2', 'Plant-3', 'Plant-5', 'Plant-7', 'Plant-9', 'Plant-10', 'Plant-12']);
            $table->string('month');
            $table->string('attendee');
            $table->string('training_topic');
            $table->string('training_topic_other')->nullable();
            $table->string('no_of_training');
            $table->string('no_of_participants');
            $table->string('total_days');
            $table->string('total_personnel_covered');
            $table->enum('status', ['submitted', 'saved', 'approved', 'rejected', 'not proceeded'])->default('not proceeded');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
