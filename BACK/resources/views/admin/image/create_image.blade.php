@extends('layouts.layout')
@section('content')
    <form method="POST"  action="{{ route('imagens.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
            <div id="imagem_form">
                <p>Name:</p> <input type="text" class="form-control" placeholder="name" name="name">
                <p>Imagem:</p><input type="file" name="images" />
                <input type="submit" value="Enviar" name="envia" />
            </div>

        </div>

        </div>
    </form>
@endsection
