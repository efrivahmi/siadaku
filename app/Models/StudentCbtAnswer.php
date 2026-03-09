<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentCbtAnswer extends Model
{
    protected $fillable = [
        'student_cbt_result_id',
        'question_bank_id',
        'student_answers',
    ];

    public function result()
    {
        return $this->belongsTo(StudentCbtResult::class, 'student_cbt_result_id');
    }

    public function question()
    {
        return $this->belongsTo(QuestionBank::class, 'question_bank_id');
    }
}
