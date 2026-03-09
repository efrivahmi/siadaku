<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    protected $fillable = [
        'class_room_id',
        'student_id',
        'subject_teacher_id',
        'date',
        'status',
    ];

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function student()
    {
        return $this->belongsTo(StudentData::class, 'student_id');
    }

    public function subjectTeacher()
    {
        return $this->belongsTo(SubjectTeacher::class);
    }
}
