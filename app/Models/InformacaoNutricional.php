<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use App\Models\Produto;

class InformacaoNutricional extends Model
{
    protected $table = 'informacoesnutricionais';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'descricao',
    'quantidade',
    'vd',
    'produtos_id',
    ];

    public function Produto()
    {
        return $this->belongsTo('App\Models\Produto');
    }

    use SoftDeletes, CascadeSoftDeletes;
}
