<?php

namespace App\Http\Controllers;

use App\Client;
use App\Credit;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function create(Client $client)
    {
        return view('credits.create',compact('client'));
    }
    public function store(Request $request,Client $client)
    {
        $this->validate($request,[
            'amount'=>'required|numeric',
            'date'=>'required|date'
        ]);
        $credit=new Credit();
        $credit->amount=$request->amount;
        $credit->client_id=$client->id;
        $credit->date=$request->date;
        $credit->save();
        session()->flash('success','Crédit ajouté avec succès');
        return redirect(route('clients.index'));

    }

    public function destroy(Credit $credit)
    {
        $credit->delete();
        session()->flash('success','Le crédit a été supprimé avec succès');
        return back();
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
