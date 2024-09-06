<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Produto;
use App\Models\Receita;
use App\Models\Galeria;
use App\Models\InformacaoNutricional;
use DB;


class WebSiteController extends Controller
{
    public function home()
    {
        $empresa = Empresa::find(1);
        $produtos = Produto::where('deleted_at','=',NULL)->orderBy('id','DESC')->get();
        $receitas = Receita::all();

        $page = 'home';
        return view('pages.index', compact('empresa', 'receitas', 'produtos', 'page'));
    }

    public function produtos()
    {
        $produtos = Produto::where('deleted_at','=',NULL)->orderBy('id','DESC')->get();
        $empresa = Empresa::find(1);
        foreach ($produtos as $produto) {
            $produto->informacoesnutricionais = InformacaoNutricional::where('produtos_id','=',$produto->id)->get();
        }

        $page = 'produtos';
        $prodselecionado = '';
        return view('pages.produtos', compact('produtos','informacoesnutricionais','empresa','page','prodselecionado'));
    }

    public function galeria()
    {
      $galeria = Galeria::all();
      $empresa = Empresa::find(1);
      $rep_galeria = array_chunk($galeria->toArray(),6);

      $page = 'galeria';
      return view('pages.galeria', compact('empresa','galeria','page','rep_galeria'));
    }

    public function produtoselecionado($prodselecionado)
    {
        $produtos = Produto::all();
        $empresa = Empresa::find(1);
        $pro = Produto::first();
        $produto = Produto::all();

        $page = 'produtos';
        return view('pages.produtos', compact('produtos','informacoesnutricionais','pro','empresa','page','prodselecionado'));
    }

    public function receitas()
    {
        $empresa = Empresa::find(1);
        $receitas = Receita::where('id',$receita);
        $receita = $receitas->first();

        $page = 'receitas';
        return view('pages.receitas', compact('empresa','page','receita'));
    }
    public function getSingleReceita($slug)
    {
        $empresa = Empresa::find(1);
        $receita = Receita::where('slug', '=', $slug)->first();

        if($receita == NULL){
          return redirect()->route('pagenotfound');
        }else{
          $page = 'receitas';
          return view('pages.receitas', compact('empresa','page','receita'));
        }
    }

    public function contato()
    {
        $empresa = Empresa::find(1);

        $page = 'contato';
        return view('pages.contato', compact('empresa','page'));
    }

    public function pagenotfound()
    {
        $empresa = Empresa::find(1);

        $page = 'erro404';
        return view('pages.erro404', compact('empresa','page'));
    }
}
