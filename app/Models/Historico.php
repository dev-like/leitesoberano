<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Historico extends Model
{
    protected $table = 'logs';
    protected $fillable = ['id','user','descricao','acoes','date'];

    use SoftDeletes, CascadeSoftDeletes;
}
