<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function posts () {
        return $this->belongsTo(Post::class);
    }
}
