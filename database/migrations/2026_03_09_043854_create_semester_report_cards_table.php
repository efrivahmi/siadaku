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
        Schema::create('semester_report_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('student_data')->cascadeOnDelete();
            $table->foreignId('class_room_id')->constrained('class_rooms')->cascadeOnDelete();
            $table->foreignId('academic_year_id')->constrained('academic_years')->cascadeOnDelete();
            $table->text('class_teacher_notes')->nullable();
            $table->integer('total_sickness')->default(0);
            $table->integer('total_leave')->default(0);
            $table->integer('total_absences')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semester_report_cards');
    }
};
