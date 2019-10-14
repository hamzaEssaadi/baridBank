@extends('layouts.layout')
@section('title')Mettre à jour vos informations @endsection
@section('location-nav')
    <ol class="breadcrumb panel">
        <li><a href="{{route('dashboard.index')}}">Tableau de bord</a></li>
        <li><a href="{{route('clients.index')}}">Gestion des clients</a></li>
        <li class="active"><strong>Mettre à jour vos informations</strong></li>
    </ol>
@endsection
@section('x_title')
    <h2>Remplir les champs</h2>
    <div class="clearfix"></div>
@endsection
@section('content')
    <form method="post" action="{{route('user.update',['user'=>$user->id])}}">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                <div class="form-group  @if($errors->get('name')) has-error @endif ">
                    <label for="name">Votre nom :</label>
                    <input id="name" type="text" class="form-control" value="{{old('name',$user->name)}}" name="name"
                           required=""/>
                    @foreach($errors->get('name') as $error)
                        <li style="color: red; margin-left: 12px;">{{$error}}</li>
                    @endforeach
                </div>
                <div class="form-group  @if($errors->get('email')) has-error @endif ">
                    <label for="email">Votre Email :</label>
                    <input id="email" type="email" class="form-control" value="{{old('email',$user->email)}}" name="email"
                           required=""/>
                    @foreach($errors->get('email') as $error)
                        <li style="color: red; margin-left: 12px;">{{$error}}</li>
                    @endforeach
                </div>
                <div class="form-group  @if($errors->get('password')) has-error @endif ">
                    <label for="password">Changer votre mot passe :</label>
                    <input id="password" type="password" class="form-control" value="" name="password"/>
                    @foreach($errors->get('password') as $error)
                        <li style="color: red; margin-left: 12px;">{{$error}}</li>
                    @endforeach
                </div>
                @csrf
                @method('put')
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
@section('script')
<script>
    // $(document).ready(function(){
        $('#password').val('');
    // });
</script>
@stop