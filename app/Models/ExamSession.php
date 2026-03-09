<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamSession extends Model
{
    protected $fillable = [
        'subject_teacher_id',
        'exam_name',
        'start_time',
        'duration_minutes',
    ];

    protected $casts = [
        'start_time' => 'datetime',
    ];

    public function subjectTeacher()
    {
        return $this->belongsTo(SubjectTeacher::class);
    }
}
