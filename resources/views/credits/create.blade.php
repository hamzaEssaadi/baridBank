@extends('layouts.layout')
@section('title')Ajouter un nouveau credit pour le client :<br>{{$client->name}} @endsection
@section('location-nav')
    <ol class="breadcrumb panel">
        <li><a href="{{route('dashboard.index')}}">Tableau de bord</a></li>
        <li><a href="{{route('clients.index')}}">Gestion des clients</a></li>
        <li class="active"><strong>Ajouter un nouveau credit pour le client {{$client->name}}</strong></li>
    </ol>
@endsection
@section('x_title')
    <h2>Remplir les champs</h2>
    <div class="clearfix"></div>
@endsection
@section('content')
    <form method="post" action="{{route('credit.store',['client'=>$client->id])}}">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                <div class="form-group  @if($errors->get('amount')) has-error @endif ">
                    <label for="amount">Montant :</label>
                    <input id="amount" type="number" min="0" class="form-control" value="{{old('amount')}}" name="amount"
                           required=""/>
                    @foreach($errors->get('amount') as $error)
                        <li style="color: red; margin-left: 12px;">{{$error}}</li>
                    @endforeach
                </div>
                <div class="form-group  @if($errors->get('date')) has-error @endif ">
                    <label for="date">Date de Crédit :</label>
                    <input id="date" type="text" class="form-control mydate" value="{{old('date')}}" name="date"
                           required=""/>
                    @foreach($errors->get('date') as $error)
                        <li style="color: red; margin-left: 12px;">{{$error}}</li>
                    @endforeach
                </div>
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary form-control">Enregistrer</button>
                    </div>
                    <div class="col-md-6"><a href="{{route('clients.show',['client'=>$client->id])}}" class="btn btn-default form-control">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('template/date_picker/css/bootstrap-datetimepicker.min.css')}}">
@stop
@section('script')
    <script src="{{asset('template/date_picker/moment.min.js')}}"></script>
    <script src="{{asset('template/date_picker/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script>
        $('.mydate').datetimepicker({
            format: "YYYY/MM/DD",
        });
    </script>
@stop