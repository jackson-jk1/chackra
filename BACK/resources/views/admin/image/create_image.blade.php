@extends('layouts.layout')
@section('content')

    <form method="POST"
          @if($edit == 1)
          action="{{ route('imagen.update',['imagen'=>$imagen->id])}}"
          @else
          action="{{ route('imagen.store') }}"
          @endif
          enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row justify-content-center">

            <div id="imagem_form">
                @if($edit == 1)
                <input type="hidden"  name="_method" value="PUT">
                    <img class="center_image mt-5" src="{{asset('storage/'.$imagen->path)}}" height="300" width="350">
                    <select  class="form-control" name="name">
                        <option value="">Selecione o tipo de imagem</option>
                        <option value="1" {{old('name',$imagen->name) == 1 ?'selected="selected"': ''}}>baner</option>
                        <option value="2" {{old('name',$imagen->name) == 2 ?'selected="selected"': ''}}>galery</option>
                    </select>
                    @else
                    <select  class="form-control" name="name">
                        <option value="">Selecione o tipo de imagem</option>
                        <option value="1">baner</option>
                        <option value="2" >galery</option>
                    </select>
                @endif
                <p>Imagem:</p><input type="file" name="images" /><br>
                    @if($edit == 3)
                        <ul class="alert alert-danger mt-5">
                            <li><p>Por favor preencha todos os campos
                                </p></li>
                        </ul>
                    @endif
                <button type="submit" class="btn btn-success mt-1">Enviar</button>
                    <a class="btn btn-primary mt-1" href="{{route('imagen.index')}}">Voltar</a>
            </div>

        </div>

        </div>
    </form>
@endsection
