<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    protected $fillable = [
        'altura',
        'largura'
    ];

    public $rules = [
        'altura' => 'required',
        'largura' => 'required'
    ];
}
