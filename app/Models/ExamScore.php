<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamScore extends Model
{
    protected $fillable = [
        'student_id',
        'subject_teacher_id',
        'exam_type',
        'score',
    ];

    public function student()
    {
        return $this->belongsTo(StudentData::class, 'student_id');
    }

    public function subjectTeacher()
    {
        return $this->belongsTo(SubjectTeacher::class);
    }
}
