<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    protected $fillable = [
        'client_id',
        'name',
        'city',
        'uf',
        'cep',
        'max_height',
        'max_length',
        'has_stake',
        'status',
    ];

    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
