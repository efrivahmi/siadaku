<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    protected $fillable = [
        'user_id',
        'school_unit_id',
        'nik',
        'nip',
        'nuptk',
        'full_name',
        'position',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schoolUnit()
    {
        return $this->belongsTo(SchoolUnit::class);
    }
}
