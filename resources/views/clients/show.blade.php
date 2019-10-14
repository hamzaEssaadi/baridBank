@extends('layouts.layout')
@section('title')Liste des crédits pour le client :<br>{{$client->name}} @endsection
@section('location-nav')
    <ol class="breadcrumb panel">
        <li><a href="{{route('dashboard.index')}}">Tableau de bord</a></li>
        <li><a href="{{route('clients.index')}}">Gestion des clients</a></li>
        <li class="active"><strong>List des crédits pour le client {{$client->name}}</strong></li>
    </ol>
@endsection
@section('x_title')
    <h2>Détails</h2>
    <div class="clearfix"></div>
@endsection
@section('content')
    <div class="col-md-5">
        <h2><u>Les informations de client</u></h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Le nom</th>
                <th>{{$client->name}}</th>
            </tr>
            <tr>
                <th>Cin</th>
                <th>{{$client->cin}}</th>
            </tr>
            <tr>
                <th>Téléphone</th>
                <th>{{$client->tel}}</th>
            </tr>
            <tr>
                <th>Pièce jointe</th>
                <th><a href="{{asset('uploads/'.$client->file)}}" class="fa fa-download"></a> </th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="col-md-7">
        <h2><u>Gestion des crédits</u></h2>
        <a href="{{route('credit.create',['client'=>$client->id])}}" class="btn btn-primary" style="float: right;">Ajouter
            un nouveau credit</a>
        @if(session()->has('success'))
            <div style="clear: both;" class="alert alert-success">
                <p>{{session()->get('success')}}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Montant</th>
                <th>Date de crédit</th>
                <th>Durée</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($client->credits()->orderBy('date','desc')->get() as $credit)
                <tr>
                    <td>{{$credit->amount}} DH</td>
                    <td>{{date('d/m/Y',strtotime($credit->date))}}</td>
                    <td>{{\Carbon\Carbon::parse($credit->date)->diffInMonths(\Carbon\Carbon::now())}} mois</td>
                    <td>
                        <a href="#" data-toggle="modal"
                           onclick="pass_id('{{$credit->id}}')"
                           data-target=".bs-example-modal-credit"><i
                                    class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{--modal for wor excption--}}
    <div class="modal fade bs-example-modal-credit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <h4>Attention !</h4>
                    <h6><strong>Êtes-vous sûr de supprimer ce crédit ?!</strong></h6>
                </div>
                <form id="delete_credit_form" method="post">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                        </button>
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <button type="submit" class="btn btn-danger">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / end  work exception's modals -->
@stop
@section('script')
    <script>
        function pass_id(id) {
            $('#delete_credit_form').attr('action', '{{url('credit')}}' + '/' + id);
        }
    </script>
@endsection