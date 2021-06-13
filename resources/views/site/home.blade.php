@extends('site.layout')

@section('title', 'Laravel CMS')

@section('content')

<section class="home">
    <div class="container">
      <div class="row">
        <div class="col-md-6 d-flex">
          <div class="align-self-center">
            <h2 class="display-4">{{$front_config['title']}}</h1>
            <p class="lead">
              {{$front_config['subtitle']}}
            </p>

            <a href="" class="btn btn-warning btn-lg">Get Start Now!</a>
          </div>
        </div>
        <div  class="col-md-6">
          <img src="{{asset('media/images/dashboard.png')}}" class="img-fluid">
        </div>
      </div>
    </div>
  </section>    

@endsection