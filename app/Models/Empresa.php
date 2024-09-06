<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'palavraschave',
    'nomefantasia',
    'instagram',
    'descricao',
    'telefone',
    'facebook',
    'achenos',
    'endereco',
    'whatsapp',
    'youtube',
    'texto',
    'email'
    ];

    use SoftDeletes, CascadeSoftDeletes;
}
