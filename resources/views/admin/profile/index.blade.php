@extends('adminlte::page')

@section('title', 'Meu perfil')

@section('content_header')
    <h1>Meu perfil</h1>
@stop

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

    @if(session('warning'))
        <div class="alert alert-info">
            {{session('warning')}}
        </div>
    @endif


    <form action="{{route('profile.save')}}" class="form-horizontal" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <div class="row">
                <label for="" class="col-sm-2 control-label">Nome Completo</label>
                <div class="col-sm-10">                                                    
                    <input type="text" name="name" value="{{$user->name}}" class="form-control {{$errors->has('name') ? 'is-invalid' : '' }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" value="{{$user->email}}" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}} ">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="" class="col-sm-2 control-label">Nova Senha</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}} ">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="" class="col-sm-2 control-label">Confirmar Senha</label>
                <div class="col-sm-10">
                    <input type="password" name="password_confirmation" class="form-control {{$errors->has('password_confirmation') ? 'is_invalid' : ''}}">
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
@stop