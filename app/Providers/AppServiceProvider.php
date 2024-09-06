<?php
namespace App\Providers;
use App\User;

use App\Models\Empresa;
use App\Models\Receita;
use App\Models\Produto;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);

        //Tabela da Empresa
        Empresa::saved(function ($dados) {
            DB::table('logs')->insert([
                'user' => \Auth::user()->nome,
                'descricao' => $dados,
                'acoes' => 'Editou as informações da Empresa',
                'date' => $dados->updated_at
            ]);
        });
        //Tabela de Receitas
        Receita::saved(function ($dados) {
          $msg = ($dados->created_at == $dados->updated_at) ? 'Adicionou' : 'Editou';
          $date = ($dados->created_at == $dados->updated_at) ? $dados->created_at : $dados->updated_at;
              DB::table('logs')->insert([
                  'user' => \Auth::user()->nome,
                  'descricao' => $dados,
                  'acoes' =>$msg.' a receita "'.$dados->nome.'"',
                  'date' => $date
              ]);
          });
        Receita::deleted(function ($dados) {
            DB::table('logs')->insert([
                'user' => \Auth::user()->nome,
                'descricao' => $dados,
                'acoes' => 'Deletou a receita "'.$dados->nome.'"',
                'date' => $dados->deleted_at
            ]);
        });
        //Tabela de Produtos
        Produto::saved(function ($dados) {
          $msg = ($dados->created_at == $dados->updated_at) ? 'Adicionou' : 'Editou';
          $date = ($dados->created_at == $dados->updated_at) ? $dados->created_at : $dados->updated_at;
              DB::table('logs')->insert([
                  'user' => \Auth::user()->nome,
                  'descricao' => $dados,
                  'acoes' =>$msg.' o produto "'.$dados->nome.'"',
                  'date' => $date
              ]);
          });
        Produto::deleted(function ($dados) {
            DB::table('logs')->insert([
                'user' => \Auth::user()->nome,
                'descricao' => $dados,
                'acoes' => 'Deletou o produto "'.$dados->nome.'"',
                'date' => $dados->deleted_at
            ]);
        });

  }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
