<?php

namespace App;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $guarded = [];
    protected $dates = [
        'publish_at'
    ];
    // protected $appends = ['image_full_path'];

    // public function getImageFullPathAttribute()
    // {
    //     return  $this->image != null  ?  url('/storage/' . $this->image) : null;
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function toArray()
    {
        return parent::toArray() + [
            'summary' => Str::limit($this->description, 100),
            'image_full_path' =>   $this->image != null  ?  url('/storage/' . $this->image) : null,
            'publish_at_formated' => $this->publish_at->format('d/M/Y'),
            'can' => [
                'update' => Gate::denies('edit-post', $this),
                'delete' => Gate::denies('edit-post', $this),
            ]
        ];
    }
}
