@extends('layouts.layout')
@section('content')
    <section>
        @include('templates.navbar')
        <div id="backgorund_baner">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                            @foreach($images as $key => $image)
                                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                    <img id ="Baner"class="d-block w-100" src="{{asset('storage/'.$image->path)}}" >
                                </div>
                            @endforeach


                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
        </div>
        <button type="button" class="btn btn-info btn-flat email-fixo" data-toggle="modal" data-target="#modalForm">
            <i class="fa fa-comment-o" style="font-size:48px"></i>
        </button>
        <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Save Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('mail')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1"><h3>Seu email</h3></label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
                                <label for="exampleFormControlInput1"><h3>Seu nome</h3></label>
                                <input type="text" class="form-control" id="name" placeholder="seu nome" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"><h3>Digite sua Mensagem</h3></label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bodyMessage"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Success</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="calendarMain">
            <h1 class="mb-5 text"> Confira um dia livre e faça uma reserva</h1>
                <div id="calendar-content main_calendar">
                @include('admin.calendar.calendar')
                </div>
        </div>
            @include('admin.client.galer_view')
        <div id="footer_map">
            @include('templates.footer')
        </div>
    </section>

@endsection




