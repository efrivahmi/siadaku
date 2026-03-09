<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningAchievement extends Model
{
    protected $fillable = [
        'subject_id',
        'phase',
        'description',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function objectives()
    {
        return $this->hasMany(LearningObjective::class);
    }
}
