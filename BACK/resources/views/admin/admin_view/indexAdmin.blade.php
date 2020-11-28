@extends('layouts.layout')
@section('content')
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>{{ Auth::user()->name }}</h3>
            </div>
            <ul class="list-unstyled components">
                <p>Bem vindo</p>
                <li>
                    <a href="{{ route('eventos') }}">Reservas</a> </li>
                <li>
                <li> <a href="{{ route('imagens') }}">Imagens</a> </li>
                <li> <a href="{{ route('imagens') }}">Administradores</a> </li>
                <li> <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();

                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}</a> </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </nav>
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">

                        <span>Toggle Sidebar</span>
                    </button>
                </div>
            </nav>

        </div>
        @guest
            @if (Route::has('imagens'))
                @include('admin.calendar.calendar');
            @endif
        @elseif(Route::has('eventos'))
            @include('admin.admin_view.client_list');


        @endguest

    </div>



@endsection
