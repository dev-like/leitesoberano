<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use App\Models\InformacaoNutricional;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'nome',
    'mododepreparo',
    'para1litro',
    'para200ml',
    'infodestaque',
    'ingredientes',
    'selo',
    'avisoimportante',
    'embalagem',
    'sifdipoa'
    ];

    public function InformacaoNutricional()
    {
      return $this->hasMany('App\Models\InformacaoNutricional');

    }

    use SoftDeletes, CascadeSoftDeletes;
}
