<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningObjective extends Model
{
    protected $fillable = [
        'learning_achievement_id',
        'tp_code',
        'description',
    ];

    public function achievement()
    {
        return $this->belongsTo(LearningAchievement::class, 'learning_achievement_id');
    }
}
