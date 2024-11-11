<?php

namespace App\Models;

use App\Enums\RolesEnum;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $casts = [
        'name' => RolesEnum::class,
    ];
}
