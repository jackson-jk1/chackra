<?php

namespace App\Http\Controllers\API;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Image;
    use App\Models\Portfolio;
    use Validator;

class PortfolioController extends Controller
{
    public function store(Request $request)
    {
        /* Verifica se o campo está correto */
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'id_image' => 'required|int',
            'description' => 'required|string'
        ]);
        if ($validator->fails())
            return response()->json([
                'dados' => $validator->errors(),
                'menssagem' => 'Campo inválido',
                'codigo'=> '400'
            ] , 400);
        $img = Image::find($request->id_image);
        if(!$img){
            return response()->json([
                'mensagem' => 'imagem nao encontada',
                'código' => '500'
            ], 500);
        }
        /* cria portifolio */
        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->image()->associate($img)->save();

        return response()->json([
            'dados' => $portfolio,
            'mensagem' => 'Portfolio criado com sucesso!',
            'código' => '201'
        ], 201);
    }


    public function update(Request $request){

        $img = Image::find($request->id_image);
        if(!$img){
            return response()->json([
                'mensagem' => 'imagem nao encontada',
                'código' => '500'
            ], 500);
        }
        $portfolio = Portfolio::find($request->id);
        if(!$portfolio){
            return response()->json([
                'mensagem' => 'Portfolio nao encontrado',
                'código' => '500'
            ], 500);
        }

        $portfolio->title = $request->title;
        $portfolio->id_image = $request->id_image;
        $portfolio->description = $request->description;
        $portfolio->save();
        return response()->json([
            'dados' => $portfolio,
            'mensagem' => 'Serviço alterado com sucesso',
            'código' => '201'
        ], 201);
    }


    public function destroy(Request $request){
        $portfolio = Portfolio::find($request->id);
        if(!$portfolio){
            return response()->json([
                'mensagem' => 'Serviço nao encontrado',
                'código' => '500'
            ], 500);
        }

        $portfolio->delete();
        return response()->json([
            'mensagem' => 'Serviço deletado com sucesso',
            'código' => '201'
        ], 201);
    }

    public function show(Request $request){

        $portfolio = Portfolio::find($request->id);
        if(!$portfolio){
            return response()->json([
                'mensagem' => 'Serviço nao encontrado',
                'código' => '500'
            ], 500);
        }
        return response()->json([
            'dados' => $portfolio,

        ]);
    }
    public function index(){
        $portfolio = Portfolio::all();
        if($portfolio->count() > 0){
            return response()->json([
                'dados' => $portfolio,
                'mensagem' => 'Serviço alterado com sucesso',
                'código' => '200'
            ], 200);
        }
        return response()->json([
            'mensagem' => 'nao ha serviços cadastrados',
            'código' => '500'
        ], 500);
    }

public function edit(){

}

}
