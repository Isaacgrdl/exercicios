@extends('template')
@section('title', 'Usuários')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
    <a class="btn btn-primary mb-2 mt-2" href={{route('create')}}>Cadastrar</a>
    <form class="bg-secondary rounded mb-2 p-2" method="POST" action="{{route('search')}}">
        @method('POST')
        @csrf
        <div class="row">
            <div class="col form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" id="email" name="email" value="{{ old('email') }}">
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Pesquisar</button>
        </div>
    </form>
    <table class="table bg-secondary text-white rounded pt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Usuário de Login</th>
            <th scope="col">Email</th>
            <th scope="col">CEP</th>
            <th scope="col">Data de Cadastro</th>
            <th scope="col-2">Opções</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->userName}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->zipCode}}</td>
                    <td>{{$user->created_at}}</td>
                    <td><a class="btn btn-primary" href="{{route('edit', ['id' => $user->id])}}">Editar</a></td>
                    <td>
                    <form method="POST" action="{{route('delete', ['id' => $user->id])}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger delete-user" value="Excluir">
                        </div>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@endsection
