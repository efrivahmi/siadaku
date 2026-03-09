<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectTeacher extends Model
{
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'class_room_id',
        'academic_year_id',
        'assessment_status',
        'submission_time',
    ];

    protected $casts = [
        'submission_time' => 'datetime',
    ];

    public function teacher()
    {
        return $this->belongsTo(EmployeeProfile::class, 'teacher_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
