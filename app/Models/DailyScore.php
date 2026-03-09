<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyScore extends Model
{
    protected $fillable = [
        'student_id',
        'subject_teacher_id',
        'learning_objective_id',
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

    public function learningObjective()
    {
        return $this->belongsTo(LearningObjective::class);
    }
}
