<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NatureOfDebt extends Model
{
    protected $fillable = [
        'nature_of_debt',
        'economic_category',
        'slug'
    ];
}
