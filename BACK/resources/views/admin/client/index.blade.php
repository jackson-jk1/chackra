@extends('layouts.layout')
@section('content')
    <h3>Listagem de clientes</h3>
    <br/><br/>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CNPJ/CPF</th>
            <th>Data Nasc.</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Sexo</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->data }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone }}</td>
                <img src="{{ url('storage/'.$client->path) }}">
                <td>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
