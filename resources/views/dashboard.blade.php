@extends('layouts.layout')
@section('title')Tableau de bord @endsection
@section('x_title')
    <h2>Statistiques</h2>
    <div class="clearfix"></div>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div style="border-color: #2A3F54;" class="tile-stats">
                <div class="icon"><i class="fa fa-money color primary"></i></div>
                <div class="count color primary">{{$sixMonth}}</div>
                <br>
                <h3 style="color: #2A3F54">Nombre de clients ayant des credits qui dépassé 6 mois</h3>
                <br>
                <p><a href="{{route('clients.index',['filter'=>'sixMonth'])}}">Voir les détails</a></p>
            </div>
        </div>
        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div style="border-color: #33cccc;height: 168px;" class="tile-stats">
                <div class="icon"><i class="fa fa-users color secondary"></i></div>
                <div class="count color secondary">{{$count}}</div>
                <br>
                <h3 style="color: #33cccc;">Le nombre total des clients</h3>
                <br>
                <p><a href="{{route('clients.index',['filter'=>'all'])}}">Voir les détails</a></p>
            </div>
        </div>
        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div style="border-color: #2A3F54;" class="tile-stats">
                <div class="icon"><i class="fa fa-money color primary"></i></div>
                <div class="count color primary">{{$year}}</div>
                <br>
                <h3 style="color: #2A3F54">Nombre de clients ayant des credits qui dépassé une année</h3>
                <br>
                <p><a href="{{route('clients.index',['filter'=>'year'])}}">Voir les détails</a></p>
            </div>
        </div>
    </div>
@stop
@section('css')
    <style>
        .tile-stats{
            border-radius: 10px;
            border-width: 3px;
            height: 230px;
            /*border-color: #33cccc;*/
        }
        .primary
        { color: #2A3F54;}
        .secondary{ color:#33cccc; }
    </style>
@endsection