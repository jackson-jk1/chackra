<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function store(Request $request)
    {
        $name_type = implode(',',array_keys(Image::IMAGE_STATUS));
        $validator = Validator::make($request->all(), [
             'name'=>"required|in:$name_type",
            'images' => 'required|image',
        ]);
        if ($validator->fails())
            return response()->json([
                'dados' => $validator->errors(),
                'menssagem' => 'Campo inválido',
                'codigo' => '400'
            ], 400);

        $image = Storage::putFile('public/imagens', $request->file('images'), 'public');
        $image =  substr($image, 7); // remove 'public/' para facilitar para o front
        $imagem = new Image();
        $imagem->name = $request->name;
        $imagem->path = $image;
        $imagem->save();
        return redirect('imagens');
    }

    public function update(Request $request ,Image $imagen)
    {

        /* Verifica se o campo está correto */
        $validator = Validator::make($request->all(), [
             'name' => 'nullable|string'
         ]);

         if ($validator->fails())
             return response()->json([
                 'dados' => $validator->errors(),
                 'menssagem' => 'Campo inválido',
                 'codigo'=> '400'
            ] , 400);

        $imagem = Image::find($imagen);
        if (!$imagem) {
            return response()->json([
                'mensagem' => $imagem,
                'código' => '500'
            ], 500);

        };

        if ($request->has('images')) {
            Storage::delete('public/'.$imagen->path);
            $image = Storage::putFile('public/imagens', $request->file('images'), 'public');
            $image =  substr($image, 7); // remove 'public/' para facilitar para o front
            $imagen->path = $image;
        }

        $imagen->name = $request->name;
        $imagen->save();
        return redirect('imagen');

    }

    public function destroy(Image $imagen)
    {

        $imagem = Image::find($imagen);
        if (!$imagem) {
            return response()->json([
                'mensagem' =>  $imagem,
                'código' => '500'
            ], 500);
        }
        Storage::delete('public/'.$imagen->path);
        $imagen->delete();
        return redirect('imagens');
    }

    public function index()
    {
        $images = Image::all();
        return view('admin.admin_view.indexAdmin',['images'=>$images,'parameter'=> 2]);
    }

    public function create(){
        return view('admin.image.create_image',['edit'=>0]);
    }

    public function edit(Image $imagen){
          $edit = 1;
        return view('admin.image.create_image',compact('imagen','edit'));
    }
}
