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
                    <textarea name="body" class="form-control body-field">{{$page->body}}</textarea>
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
    
    {{-- CDN do TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>

        tinyMCE.init({
            selector:'textarea.body-field',
            height: 300,
            menubar:false,
            plugins: ['link', 'table', 'image', 'autoresize', 'lists'],
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist',
            content_css:[
                ' {{ asset('assets/css/content.css') }} '
            ],
            images_upload_url: '{{route('imageupload')}}',
            images_upload_credentials: true,
            convert_urls : false
        })

    </script>

@endsection