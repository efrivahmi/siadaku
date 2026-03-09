<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailedReportCardScore extends Model
{
    protected $fillable = [
        'semester_report_card_id',
        'subject_id',
        'daily_average',
        'exam_average',
        'final_score',
        'predicate',
        'achievement_description',
    ];

    public function reportCard()
    {
        return $this->belongsTo(SemesterReportCard::class, 'semester_report_card_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
