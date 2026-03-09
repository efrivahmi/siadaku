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
        Schema::create('detailed_report_card_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semester_report_card_id')->constrained('semester_report_cards')->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->float('daily_average')->default(0);
            $table->float('exam_average')->default(0);
            $table->float('final_score')->default(0);
            $table->string('predicate')->nullable();
            $table->text('achievement_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailed_report_card_scores');
    }
};
