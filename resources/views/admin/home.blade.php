@extends('adminlte::page')

@section('plugins.Chartjs', true)

@section('title', 'Painel')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Dashboard</h1>
        </div>

        <div class="col-md-6">
            <form method="get">
                {{-- Ao muda o valor --}}
                <select onChange="this.form.submit()" name="interval"  class="mr-3 btn float-md-right">
                    <option {{$dateInterval == 60 ? 'selected="selected"' : ''}} value="60">Últimos 60 dias</option>
                    <option {{$dateInterval == 90 ? 'selected="selected"' : ''}} value="90">Últimos 90 dias</option>
                    <option {{$dateInterval == 120 ? 'selected="selected"' : ''}} value="120">Últimos 120 dias</option>
                    <option {{$dateInterval == 150 ? 'selected="selected"' : ''}} value="150">Últimos 150 dias</option>
                </select>

            </form>
        </div>
    </div>
 
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$visitsCount}}</h3>
                    <p>Acessos</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-eye"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$onlineCount}}</h3>
                    <p>Usuários online</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$pageCount}}</h3>
                    <p>Páginas</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-sticky-note"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$userCount}}</h3>
                    <p>Usuários</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-user"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Páginas mais visitas</h3>
                </div>
                <div class="card-body">
                    <canvas id="pagePie"></canvas>
                </div>
            </div>
            
        </div>
    </div>

    <script>

    window.onload = function (){
        let ctx = document.getElementById('pagePie').getContext('2d')
        window.pagePie = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                    data: {{$pageValues}},
                    backgroundColor: '#0000FF'
                }],
                labels: {!! $pageLabels !!}
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                }
            }
        })
    }

    function lastDays(){
        let days = document.getElementById('lastdays').value
        console.log(days)
    }

    lastDays()

    </script>
@stop
