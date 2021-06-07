@extends('adminlte::page')

@section('title', 'Editar página')

@section('content_header')
    <h1>
        Editar página
    </h1>
@endsection

@section('content')

    @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                <h5>Ocorreu um erro</h5>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
       </ul>
    @endif


    <form action="{{route('pages.update', ['page' => $page->id])}}" class="form-horizontal" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <div class="row">
                <label for="" class="col-sm-2 control-label">Título</label>
                <div class="col-sm-10">                                                    
                    <input type="text" name="title" value="{{$page->title}}" class="form-control {{$errors->has('title') ? 'is-invalid' : '' }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="" class="col-sm-2 control-label">Corpo</label>
                <div class="col-sm-10">
                    <textarea name="body" class="form-control">{{$page->body}}</textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <input type="submit" value="Salvar" class="btn btn-success">
                </div>
            </div>
        </div>
        
    </form>
    
    

@endsection