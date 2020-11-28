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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:500',
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
        return response()->json([
            'dados' => $imagem,
            'mensagem' => 'Imagem criada com sucesso!',
            'código' => '201'
        ], 201);

    }

    public function update(Request $request)
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

        $imagem = Image::find($request->id);
        if (!$imagem) {
            return response()->json([
                'mensagem' => 'imagem nao encontrada',
                'código' => '500'
            ], 500);

        };

        if ($request->has('images')) {
            Storage::delete($imagem->caminho);
            $caminho = Storage::putFile('public/imagens', $request->file('images'), 'public');
            $caminho = substr($caminho, 7);
            $imagem->path = $caminho;
        }

        $imagem->name = $request->name;
        $imagem->save();
        return response()->json([
            'mensagem' => 'Serviço alterado com sucesso',
            'código' => '201'
        ], 201);

    }

    public function destroy(Request $request)
    {

        $imagem = Image::find($request->id);
        if (!$imagem) {
            return response()->json([
                'mensagem' => 'imagem nao encontrada',
                'código' => '500'
            ], 500);
        }

        Storage::delete('public/'.$imagem->path);
        $imagem->delete();
        return response()->json([
            'mensagem' => 'imagem excluida com sucesso',
            'código' => '200'
        ], 200);
    }

    public function index()
    {
        $images = Image::all();
        return view('admin.admin_view.indexAdmin');
    }



    public function show(Request $request)
    {
        $imagem = Image::find($request->id);
        if (!$imagem) {
            return response()->json([
                'mensagem' => 'Imagem nao encontrado',
                'código' => '500'
            ], 500);

        }

        return response()->json([
            'dados' => $imagem,
            'mensagem' => 'imagem mostrada com sucesso',

        ]);

    }
    public function create(){
        return view('admin.client.create_image');
    }

}
