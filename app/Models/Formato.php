<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
    protected $fillable = [
        'nome',
        'portal_id',
        'medida_id',
        'linhacriativa_id'
    ];

    public $rules = [
        'nome' => 'required|max:255|',
        'medida_id' => 'required',
        'linhacriativa_id' => 'required'
    ];

    public function linhacriativa(){
        return $this->belongsTo(Portal::class);
    }

    public function medida(){
        return $this->belongsTo(Medida::class);
    }
}
