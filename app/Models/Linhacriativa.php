<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Linhacriativa extends Model
{
    protected $fillable = [
        'nome',
        'campanha_id',
        'portal_id',
    ];

    public $rules = [
        'nome' => 'required|max:255|',
    ];

    public function formatos(){
        return $this->hasMany(Formato::class);
    }
}
