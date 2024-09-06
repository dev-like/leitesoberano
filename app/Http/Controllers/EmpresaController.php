<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
      $empresa = Empresa::get();
      $empresa = count($empresa) ? $empresa[0] : new Empresa();

      return view('admin.empresa.index', ['empresa' => $empresa]);
    }

    public function create()
    {
      return view('admin.empresa.index');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(

      ));
      $requestData = $request->all();
      $empresa = Empresa::create($requestData);

      $request->session()->flash('success', 'Dados da empresa cadastrados com sucesso.');
      return redirect('admin/empresa')->with('flash_message', 'Quem Somos adicionado!');
    }

    public function edit($id)
    {
      $empresa = Empresa::findOrFail($id);
      return view('admin.empresa.edit', compact('empresa'));
    }

    public function update(Request $request, $id)
    {
      $requestData = $request->all();
      $empresa = Empresa::findOrFail($id);
      $empresa->update($requestData);

      $request->session()->flash('success', 'Registro modificado com sucesso.');
      return redirect('admin/empresa')->with('flash_message', 'Quem somos alterado com sucesso !');
    }
}
