<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Receita;
use Image;
use Storage;
use DB;

class ReceitaController extends Controller
{
    public function index()
    {
      $receitas = Receita::all();

      return view('admin.receita.index', compact('receitas'));
    }

    public function create()
    {
      return view('admin.receita.index');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(
        'capa'        => 'required|image|mimes:jpeg,png,jpg',
        'ingredientes' => 'required',
        'modopreparo' => 'required',
      ));

      $slug = Self::tirarAcentos(str_replace(" ", "-", $request->nome));

      $receitas = new Receita;
      $receitas->nome  = $request->nome;
      $receitas->duracao  = $request->duracao;
      $receitas->porcoes  = $request->porcoes;
      $receitas->descricao  = $request->descricao;
      $receitas->palavraschave  = $request->palavraschave;
      $receitas->nivel  = $request->nivel;
      $receitas->ingredientes  = $request->ingredientes;
      $receitas->modopreparo  = $request->modopreparo;
      $receitas->slug            = $slug;
      $receitas->datapublicacao = Carbon::now();
      $receitas->datapublicacao->toDateTimeString();

      if ($request->hasFile('capa')) {
          $image = $request->file('capa');
          $filename = time() . '.' . $image->getClientOriginalName();
          $location = public_path('uploads/receitas/' . $filename);
          Image::make($image)->save($location);
          $receitas->capa = $filename;
      }

      $receitas->save();

      $request->session()->flash('success', 'Receita '.$receitas->nome. 'cadastrada com sucesso !');
      return redirect('admin/receitas')->with('flash_message', 'Receita cadastrada com sucesso !');
    }

    public function tirarAcentos($string)
    {
      return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/","/(\/)/","/(:)/","/(,)/","/(!)/","/(?)/",'/\(|\)/'),explode(" ","a A e E i I o O u U n N c C - - - - "),$string);
    }

    public function edit($id, Request $request)
    {
      $receitas = Receita::findOrFail($id);
      return view('admin.receita.edit', compact('receitas'));
    }

    public function update(Request $request, $id)
    {
      $receitas = Receita::find($id);
      $receitas->fill($request->all());

      $slug = Self::tirarAcentos(str_replace(" ", "-", $request->nome));
      $receitas->slug = $slug;

      if ($request->hasFile('capa')) {
          $image = $request->file('capa');
          $filename = time() . '.' . $image->getClientOriginalName();
          $location = public_path('uploads/receitas/' . $filename);
          Image::make($image)->save($location);

          if ($receitas->capa) {
          $oldFilename = $receitas->capa;
          Storage::delete('uploads/receitas/'.$oldFilename);
        }
        $receitas->capa = $filename;
      }

      $receitas->save();

      $request->session()->flash('success', 'Receita modificado com sucesso.');
      return redirect('admin/receitas')->with('flash_message', 'Receita alterado com sucesso !');
    }

    public function destroy($id)
    {
      $receitas = Receita::find($id)->delete();
      return [response()->json("success"), redirect('admin/receitas')];
    }
}
