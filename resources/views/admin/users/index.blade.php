@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>
        Meus usuários
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">Novo Usuário</a>
    </h1>
@endsection

@section('content')
    
    {{-- @foreach ($users as $user)
        Nome: {{$user->name}} <br>
    @endforeach --}}

    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        @foreach($users as $user)
            <tr>
                
                    <td> {{$user->id}} </td>
                    <td> {{$user->name}} </td>
                    <td> {{$user->email}} </td>
                    <td>
                        <a href="{{ route('users.edit', ['user' => $user->id]) }} " class="btn btn-sm btn-info">Editar</a>
                        @if($loggedId !== intval($user->id))
                            <form class="d-inline" method="post" action="{{route('users.destroy', ['user' => $user->id])}}" onsubmit="return confirm('Deseja realmente excluir?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        @endif
                    </td>
                
            </tr>
        @endforeach
    </table>

    {{ $users->links() }}

@endsection