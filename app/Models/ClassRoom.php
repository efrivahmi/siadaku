<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $fillable = [
        'school_unit_id',
        'academic_year_id',
        'class_name',
        'homeroom_teacher_id',
    ];

    public function schoolUnit()
    {
        return $this->belongsTo(SchoolUnit::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function homeroomTeacher()
    {
        return $this->belongsTo(EmployeeProfile::class, 'homeroom_teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(StudentData::class, 'class_room_student_data', 'class_room_id', 'student_data_id');
    }
}
