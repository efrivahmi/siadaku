<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SemesterReportCard extends Model
{
    protected $fillable = [
        'student_id',
        'class_room_id',
        'academic_year_id',
        'class_teacher_notes',
        'total_sickness',
        'total_leave',
        'total_absences',
    ];

    public function student()
    {
        return $this->belongsTo(StudentData::class, 'student_id');
    }

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function details()
    {
        return $this->hasMany(DetailedReportCardScore::class);
    }
}
