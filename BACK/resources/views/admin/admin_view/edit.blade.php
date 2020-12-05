@extends('layouts.layout')
@section('content')

        <form  method="POST" action="{{route('event.update',['event'=>$event->id])}}">
            @csrf
            {{method_field('PUT')}}
            <div class="mt-5" style="margin:auto; width: 60%">

            <div class="form-group">
                <label for="title"><h3>Nome do evento</h3></label>
                <input type="text" class="form-control" id="title" placeholder="nome" name="title" value="{{old('title',$event->title)}}">
            </div>
            <div class="form-group">
                <label for="start"><h3>Inicio do evento</h3></label>
                <input type="datetime-local" class="form-control" id="start" placeholder="Data de inicio" name="start" value="{{old('title',$event->start)}}">
            </div>
            <div class="form-group">
                <label for="end"><h3>Fim do evento</h3></label>
                <input type="datetime-local" class="form-control" id="end" placeholder="Data final" name="end" value="{{old('title',$event->end)}}">
            </div>
            <div class="form-group">
                <input type="color" class="form-control" id="color"  name="color" value="{{old('title',$event->color)}}"> </input>
            </div>
            <button type="submit" class="btn btn-success mt-1">enviar</button>
                <a class="btn btn-primary mt-1" href="{{route('event.index')}}">Voltar</a>
                </div>

            </div>
        </form>


@endsection


