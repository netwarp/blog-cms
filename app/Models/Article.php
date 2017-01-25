<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use \Conner\Tagging\Taggable;
    
    protected $fillable = [
        'title',
        'slug',
        'image',
        'overview',
        'content'
    ];

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
}
