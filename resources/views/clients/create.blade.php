@extends('layouts.layout')
@section('title')Ajouter un nouveau client @endsection
@section('location-nav')
    <ol class="breadcrumb panel">
        <li><a href="{{route('dashboard.index')}}">Tableau de bord</a></li>
        <li><a href="{{route('clients.index')}}">Gestion des clients</a></li>
        <li class="active"><strong>Ajouter un nouveau client</strong></li>
    </ol>
@endsection
@section('x_title')
    <h2>Remplir les champs</h2>
    <div class="clearfix"></div>
@endsection
@section('content')
    <form method="post" action="{{route('clients.store')}}" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                <div class="form-group  @if($errors->get('name')) has-error @endif ">
                    <label for="name">Le nom complete :</label>
                    <input id="name" type="text" class="form-control" value="{{old('name')}}" name="name" required=""/>
                    @foreach($errors->get('name') as $error)
                        <li style="color: red; margin-left: 12px;">{{$error}}</li>
                    @endforeach
                </div>
                <div class="form-group  @if($errors->get('cin')) has-error @endif ">
                    <label for="cin">Cin :</label>
                    <input id="cin" type="text" class="form-control" value="{{old('cin')}}" name="cin" required=""/>
                    @foreach($errors->get('cin') as $error)
                        <li style="color: red; margin-left: 12px;">{{$error}}</li>
                    @endforeach
                </div>
                <div class="form-group  @if($errors->get('tel')) has-error @endif ">
                    <label for="tel">Téléphone :</label>
                    <input id="tel" type="text" class="form-control" value="{{old('tel')}}" name="tel" required=""/>
                    @foreach($errors->get('tel') as $error)
                        <li style="color: red; margin-left: 12px;">{{$error}}</li>
                    @endforeach
                </div>
                <div class="form-group  @if($errors->get('attached_file')) has-error @endif ">
                    <label for="attached_file">Pièce jointe :</label>
                    <input id="attached_file" type="file" class="file" value="{{old('attached_file')}}" name="attached_file" required=""/>
                    @foreach($errors->get('attached_file') as $error)
                        <li style="color: red; margin-left: 12px;">{{$error}}</li>
                    @endforeach
                </div>
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary form-control">Enregistrer</button>
                    </div>
                    <div class="col-md-6"><a href="{{route('clients.index')}}" class="btn btn-default form-control">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop