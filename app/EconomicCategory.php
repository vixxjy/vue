<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EconomicCategory extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];
}
