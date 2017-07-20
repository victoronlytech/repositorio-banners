<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'imagem'
    ];

    public $rules = [
        'nome' => 'required|max:255|',
        'descricao' => 'required|max:255|',
        'imagem' => 'required|max:255|',
    ];

    public function portais(){
        return $this->belongsToMany(Portal::class);
    }
}
