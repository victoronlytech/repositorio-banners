<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peca extends Model
{
    protected $fillable = [
        'nome',
        'arquivo',
        'nome_original',
        'pasta',
        'formato_id',
    ];

    public $rules = [
        'nome' => 'required|max:255|',
        'arquivo' => 'required'
    ];

    public function formato(){
        return $this->belongsTo(Formato::class);
    }
}
