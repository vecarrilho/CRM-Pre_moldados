<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'email',
        'cpf_cnpj',
        'phone',
        'city',
        'uf',
        'cep',
        'street',
        'address_number',
        'status',
    ];

    public $timestamps = false;
}
