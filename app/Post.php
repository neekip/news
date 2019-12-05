<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
