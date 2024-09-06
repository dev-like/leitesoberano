<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Galeria;
use Illuminate\Http\Request;
use Image as ImageFiles;
use Storage;
use DB;
use Carbon\Carbon;

class GaleriaController extends Controller
{


  public function fileStore(Request $request)
  {
    $image = $request->file('file');
    $imageName = $image->getClientOriginalName();
    $image->move(public_path('images'),$imageName);

    $galeria = new Galeria();
    $galeria->caminho = $imageName;
    $galeria->save();

    return response()->json(['success'=>$imageName]);
  }

    public function gallery()
    {
      $galeria = Galeria::all();
      return view('admin.galeria.gallery', ['galeria' => $galeria]);
    }

    public function doImageUpload(Request $request){

      $image_file = $request->file('file');
      $filename = $image_file->getClientOriginalName();
      $location = public_path('uploads/galeria/' . $filename);
      ImageFiles::make($image_file)->save($location);

      $galeria = new Galeria();
      $galeria->caminho = $filename;
      $galeria->save();
    }

    public function destroyImage(Request $request, $id){

      $galeria = Galeria::find($id);
      Storage::delete('galeria/'.$galeria->file_name);

      $galeria->delete();

      return response()->json("Sucesso");

    }
}
