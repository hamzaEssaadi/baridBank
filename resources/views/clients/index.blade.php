@extends('layouts.layout')
@section('css')
    <link href="{{asset('template/datatable/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@stop
@section('title')Gestion des clients @endsection
@section('x_title')
    <h2>Liste des clients</h2>
    <a href="{{route('clients.create')}}" class="btn btn-primary xs" style="float: right;">Ajouter un nouveau client</a>
    <div class="clearfix"></div>
@endsection
@section('content')
    @if(session()->get('success'))
        <div class="alert alert-success">
            <b>{{session()->get('success')}}</b>
        </div>
    @endif
    <center>
        @php
        $filter=session()->get('filter');
        @endphp
        <div class="btn-group">
            <a href="{{route('clients.index',['filter'=>'year'])}}" class="btn btn-info @if ($filter=='year') active @endif" >Dettes supérieures à un an</a>
            <a href="{{route('clients.index',['filter'=>'all'])}}" class="btn btn-info  @if ($filter=='all') active @endif" >Afficher tout</a>
            <a href="{{route('clients.index',['filter'=>'sixMonth'])}}" class="btn btn-info @if ($filter=='sixMonth') active @endif" >Dettes supérieures à 6 mois</a>
        </div>
    </center>
    <table id="table" class="table table-hover">
        <thead>
        <tr>
            <th>Le nom</th>
            <th>Cin</th>
            <th>Tel</th>
            <th>Pièce jointe</th>
            <th>Date du début de crédit</th>
            <th>Durée du crédit</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{$client->name}}</td>
                <td>{{$client->cin}}</td>
                <td>{{$client->tel}}</td>
                <td><a href="{{asset('uploads/'.$client->file)}}" class="fa fa-download"></a></td>
                <td>
                    @if($client->date != null)
                       <span class="hidden">{{$client->date}}</span>{{date('d/m/Y',strtotime($client->date))}}
                    @endif
                </td>
                <td>
                    @if($client->date != null)
                        {{$client->duration}} mois
                    @endif
                </td>
                <td>
                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-xs" type="button"
                                aria-expanded="false">Sélectionnez l'action <span class="caret"></span>
                        </button>
                        <ul role="menu" class="dropdown-menu">
                            <li>
                                <a href='{{route('clients.edit',['client'=>$client->id])}}'><i class="fa fa-edit">
                                        Modifier</i></a>
                            </li>
                            <li><a href='{{route('credit.create',['client'=>$client->id])}}'><i class="fa fa-plus">
                                        Ajouter un crédit</i></a>
                            </li>
                            <li><a href='{{route('clients.show',['client'=>$client->id])}}'><i class="fa fa-money"> List
                                        des crédits</i></a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
@section('script')
    <script src="{{asset('template/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/datatable/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $('#table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });
    </script>
@endsection