<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentData extends Model
{
    protected $fillable = [
        'user_id',
        'school_unit_id',
        'parent_user_id',
        'student_id',
        'full_name',
        'grade_year',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schoolUnit()
    {
        return $this->belongsTo(SchoolUnit::class);
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_user_id');
    }
}
