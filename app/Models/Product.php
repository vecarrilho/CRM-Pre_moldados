<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'height',
        'length',
        'area',
        'status',
    ];

    public $timestamps = false;
}
