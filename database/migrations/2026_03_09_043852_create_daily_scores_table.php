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
        Schema::create('daily_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('student_data')->cascadeOnDelete();
            $table->foreignId('subject_teacher_id')->constrained('subject_teachers')->cascadeOnDelete();
            $table->foreignId('learning_objective_id')->constrained('learning_objectives')->cascadeOnDelete();
            $table->float('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_scores');
    }
};
