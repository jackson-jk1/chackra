@extends('layouts.layout')
@section('content')
    <form method="POST"  action="{{ route('clients.store') }}">
        @csrf
        <a href="{{ route('clients.store') }}">aaaaaaaaaaaaaaaa</a>
        <div class="form-group">
            <label for="name">nome</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Digite seu nome">
        </div>
        <div class="form-group">
            <label for="email">Endereço de email</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Seu email">
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
        </div>
        <div class="form-group">
        <label for="phone">Telefone</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Telefone">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection


