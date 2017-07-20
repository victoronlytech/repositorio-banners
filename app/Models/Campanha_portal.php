<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Campanha_portal extends Model
{
    protected $fillable = [
        'campanha_id',
        'portal_id'
    ];

    public $rules = [
        'portal_id' => 'required|max:255|'
    ];
}
