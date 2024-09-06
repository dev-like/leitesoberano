<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Receita extends Model
{
    protected $table = 'receitas';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'nome',
    'descricao',
    'palavraschave',
    'datapublicacao',
    'capa',
    'duracao',
    'porcoes',
    'nivel',
    'ingredientes',
    'modopreparo',
    'slug'
    ];

    use SoftDeletes, CascadeSoftDeletes;
}
