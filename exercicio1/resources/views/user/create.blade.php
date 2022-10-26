@extends('template')
@section('title', 'Cadastro de Usuário')
@section('content')
    <a class="btn btn-primary mb-2 mt-2" href={{route('index')}}>Voltar</a>
    <form method="POST" action="{{ route('store') }}" class="container bg-secondary text-white rounded p-4">
        @csrf
        @method('POST')
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
            <label for="name">Nome Completo</label>
            <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="userName">Nome de Login</label>
            <input class="form-control" type="text" id="userName" name="userName" value="{{ old('userName') }}">
        </div>
        <div class="form-group">
            <label for="zipCode">CEP</label>
            <input class="form-control" type="text" id="zipCode" name="zipCode" value="{{ old('zipCode') }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password">Senha (8 caracteres minímo, contendo pelo menos 1 letra e 1 número)</label>
            <input class="form-control" type="password" id="password" name="password">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Cadastrar</button>
        </div>
    </form>
@endsection
