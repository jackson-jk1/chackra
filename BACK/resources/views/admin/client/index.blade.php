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
        <div id="calendarMain">
            <h1 class="mb-5"> Confira um dia livre e faça uma reserva</h1>
                <div id="calendar-content">
                @include('admin.client.calendar')
                </div>
        </div>
        <div id="Section_image">
        <div class="card-deck">
            @foreach($galleries as $gallery)
            <div class="card mb-5">
                <img class="card-img-top" src="{{asset('storage/'.$gallery->path)}}" height="300">
                <div class="card-body">
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            @endforeach
           </div>
        </div>

        <div id="footer_map">
            @include('templates.footer')
        </div>

    </section>


@endsection




