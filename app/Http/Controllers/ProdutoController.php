<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;
use DB;
use Image;
use Storage;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
      $produtos = Produto::all();

      return view('admin.produto.index', compact('produtos'));
    }

    public function create()
    {
      $produtos = Produto::all();

      return view('admin.produtos.create', compact('produtos'));
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
          'nome'             => 'required',
          'embalagem'        => 'image|mimes:jpeg,png,jpg',
          'selo'             => 'image|mimes:jpeg,png,jpg',
          'avisoimportante'  => 'required',
        ));

        $slug = Self::tirarAcentos(str_replace(" ", "", $request->nome));

        $produtos = new Produto;
        $produtos->fill($request->all());

        if ($request->hasFile('embalagem')) {
            $image = $request->file('embalagem');
            $extension = $image->getClientOriginalExtension();
            $filename = 'embalagem-'.$slug.'.'.$extension;
            $location = public_path('uploads/produtos/' . $filename);
            Image::make($image)->save($location);
            $produtos->embalagem = $filename;
        }
        if ($request->hasFile('selo')) {
            $image = $request->file('selo');
            $extension = $image->getClientOriginalExtension();
            $filename = 'selo-'.$slug.'.'.$extension;
            $location = public_path('uploads/produtos/' . $filename);
            Image::make($image)->save($location);
            $produtos->selo = $filename;
        }

        $produtos->save();
        $request->session()->flash('success', 'Produto adicionado com sucesso.');
        return redirect()->route('produtos.index');
    }

    public function tirarAcentos($string)
    {
      return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/","/(\/)/","/(:)/","/(,)/","/(!)/","/(?)/",'/\(|\)/'),explode(" ","a A e E i I o O u U n N c C - - - - "),$string);
    }

    public function edit($id, Request $request)
    {
      $produtos = Produto::findOrFail($id);
      return view('admin.produto.edit', compact('produtos'));
    }

    public function update(Request $request, $id)
    {
      $produtos = Produto::find($id);

      $slug = Self::tirarAcentos(str_replace(" ", "", $request->nome));

      $produtos->fill($request->all());

      if ($request->hasFile('embalagem')) {
          $image = $request->file('embalagem');
          $extension = $image->getClientOriginalExtension();
          $filename = 'embalagem-'.$slug.'.'.$extension;
          $location = public_path('uploads/produtos/' . $filename);
          Image::make($image)->save($location);

          if ($produtos->embalagem) {
              $oldFilename = $produtos->embalagem;
              Storage::delete('uploads/produtos/'.$oldFilename);
          }
          $produtos->embalagem = $filename;
      }
      if ($request->hasFile('selo')) {
          $image = $request->file('selo');
          $extension = $image->getClientOriginalExtension();
          $filename = 'selo-'.$slug.'.'.$extension;
          $location = public_path('uploads/produtos/' . $filename);
          Image::make($image)->save($location);

          if ($produtos->selo) {
              $oldFilename = $produtos->selo;
              Storage::delete('uploads/produtos/'.$oldFilename);
          }
          $produtos->selo = $filename;
      }

      $produtos->save();
      $request->session()->flash('success', 'Produto alterado com sucesso.');
      return redirect()->route('produtos.index');
    }

    public function destroy($id)
    {
        $produtos = Produto::find($id);
        $produtos->delete();
        return [response()->json("success"), redirect('admin/produtos')];
    }
}
