<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cifra extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome_musica',
        'nome_autor',
        'estilo_id',
        'conteudo'
    ];

    public function estilo()
    {
        return $this->belongsTo('App\Models\Estilo');
    }

    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }

}
