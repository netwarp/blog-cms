<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'email',
        'content',
        'ip',
        'content'
    ];

    public function article() {
        return $this->belongsTo('App\Models\Article');
    }
}
