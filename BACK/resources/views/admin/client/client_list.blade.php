@extends('layouts.layout')
@section('content')
    <div  id="list" class="container mt-5  ">
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->phone}}</td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>
@endsection
