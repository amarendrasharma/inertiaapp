<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    protected $appends = ['image_full_path'];

    public function getImageFullPathAttribute()
    {
        return  $this->image != null  ?  url('/storage/' . $this->image) : null;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
