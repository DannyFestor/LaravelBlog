<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'description'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // Laravel < 7
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
