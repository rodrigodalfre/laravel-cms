@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('content_header')
    <h1>
        Novo Usuário
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


    <form action="{{route('users.store')}}" class="form-horizontal" method="POST">
        @csrf
        <div class="form-group">
            <div class="row">
                <label for="" class="col-sm-2 control-label">Nome Completo</label>
                <div class="col-sm-10">                                                    
                    <input type="text" name="name" value="{{old('name')}}" class="form-control {{$errors->has('name') ? 'is-invalid' : '' }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" value="{{old('email')}}" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}} ">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="" class="col-sm-2 control-label">Senha</label>
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
                    <input type="submit" value="Cadastrar" class="btn btn-success">
                </div>
            </div>
        </div>
    </form>
    
    

@endsection