<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Portal extends Model
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

    public function campanhas(){
        return $this->belongsToMany(Campanha::class);
    }

    public function linhascriativas(){
        return $this->hasMany(Linhacriativa::class);
    }
}
