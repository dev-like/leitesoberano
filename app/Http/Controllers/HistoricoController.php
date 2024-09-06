<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Historico;
use DB;

class HistoricoController extends Controller
{
    public function index()
    {
      $historico = DB::table('logs')->get();
      return view('admin.historico.index', ['historico' => $historico]);
    }
}
