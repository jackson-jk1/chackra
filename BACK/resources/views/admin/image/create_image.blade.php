@extends('admin.image.resources.views.layouts.layout')
@section('content')
    <form method="POST"  action="{{ route('imagens.store') }}" enctype="multipart/form-data">
        @csrf
    Name: <input type="text" name="name"></br>
    Imagem: <input type="file" name="images" /></br>
    <input type="submit" value="Enviar" name="envia" />
</form>
@endsection
