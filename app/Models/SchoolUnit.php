<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolUnit extends Model
{
    protected $fillable = [
        'unit_name',
        'level',
    ];

    public function employees()
    {
        return $this->hasMany(EmployeeProfile::class);
    }

    public function students()
    {
        return $this->hasMany(StudentData::class);
    }

    public function classes()
    {
        return $this->hasMany(ClassRoom::class);
    }
}
