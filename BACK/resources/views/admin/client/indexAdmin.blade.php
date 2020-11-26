@extends('layouts.layout')
@section('content')
    <div  id="list" class="container mt-5  ">
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Eventos</th>
                            <th>Imagens</th>
                        </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td><a class="nav-link" href="{{ route('login') }}">{{ __('Eventos') }}</a></td>
                                <td><a class="nav-link" href="{{ route('login') }}">{{ __('Imagens') }}</a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
