<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostInteraction extends Model
{
    protected $fillable = [
        'post_id',
        'user_id',
        'interaction_type',
        'comment_content',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
