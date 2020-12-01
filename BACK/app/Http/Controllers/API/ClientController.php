<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.client.index',['clients' => $clients]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'data' => 'required|date',
            'images' => 'required|image',
        ]);
        if ($validator->fails())
            return response()->json([
                'dados' => $validator->errors(),
                'menssagem' => 'Campo inválidoaa',
                'codigo'=> '400'
            ] , 400);
        $client = new Client;
        $image = Storage::putFile('public/imagens', $request->file('images'), 'public');
        $image =  substr($image, 7); // remove 'public/' para facilitar para o front
        $client->path = $image;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->data = $request->data;
        $client->save();


        return response()->json([
            'mensagem' => 'Portfolio criado com sucesso!',
            'código' => '201'
        ], 201);
        return redirect()->to('admin/clients');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|int',


        ]);
        if ($validator->fails()){
            return response()->json([
                'dados' => $validator->errors(),
                'menssagem' => 'erro validaçao',

            ]);
        }
        $client = Client::find($request->id);
        if(!$client){
            return response()->json([
                'mensagem' => 'Serviço nao encontrado',
                'código' => '500'
            ], 500);
        }
        return response()->json([
            'dados' => $client,

        ]);
        return redirect()->to('admin/clients');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {

        return view('admin.client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $validator = Validator::make($request->all(),
            $valid =[
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'data' => 'required|date'
        ]);
        if ($validator->fails()){
            return response()->json([
                'dados' => $validator->errors(),
                'menssagem' => 'erro validaçao',

            ]);
        }
        if(!$client){
            return response()->json([
                'mensagem' => 'cliente nao encontrado',
                'código' => '500'
            ], 500);
        }

        $valid = $request->all();
        $client->fill($valid);
        $client->save();

        return redirect()->to('admin/clients');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
