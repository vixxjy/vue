<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['arrear_id', 'parent_id', 'body'];

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
