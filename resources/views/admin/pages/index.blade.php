@extends('adminlte::page')

@section('title', 'Páginas')

@section('content_header')
    <h1>
        Minhas páginas
        <a href="{{ route('pages.create') }}" class="btn btn-sm btn-success">Nova página</a>
    </h1>
@endsection

@section('content')
    
    {{-- @foreach ($users as $user)
        Nome: {{$user->name}} <br>
    @endforeach --}}

    <table class="table table-hover">
        <tr> 
            <th width="50px">ID</th>
            <th>Título</th>
            <th width="200px">Ações</th>
        </tr>
        @foreach($pages as $page)
            <tr>
                
                    <td> {{$page->id}} </td>
                    <td> {{$page->title}} </td>
                    <td>
                        <a href="" target="_blank" class="btn btn-sm btn-warning">Ver</a>

                        <a href="{{ route('pages.edit', ['page' => $page->id]) }} " class="btn btn-sm btn-info">Editar</a>
                        <form class="d-inline" method="post" action="{{route('pages.destroy', ['page' => $page->id])}}" onsubmit="return confirm('Deseja realmente excluir?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                
            </tr>
        @endforeach
    </table>

    {{ $pages->links() }}

@endsection