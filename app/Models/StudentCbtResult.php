<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentCbtResult extends Model
{
    protected $fillable = [
        'exam_session_id',
        'student_id',
        'multiple_choice_score',
        'essay_status',
        'essay_score',
    ];

    public function examSession()
    {
        return $this->belongsTo(ExamSession::class);
    }

    public function student()
    {
        return $this->belongsTo(StudentData::class, 'student_id');
    }
}
