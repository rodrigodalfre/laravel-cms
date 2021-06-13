@extends('site.layout')

@section('title', $page['title'])

@section('content')

<div>
    <h3>{!!$page['body']!!}</h3>
</div>

@endsection