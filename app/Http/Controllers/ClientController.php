<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('filter')) {
            $filter = $request->get('filter');
            if ($filter == 'all') {
                \session()->put('filter', 'all');
                $nb = 0;
            } elseif ($filter == 'sixMonth') {
                \session()->put('filter', 'sixMonth');
                $nb = 6;
            } else {
                \session()->put('filter', 'year');
                $nb = 12;
            }
        } else {
            if (session()->has('filter')) {
                $filter = session()->get('filter');
                if ($filter == 'all') {
                    $nb = 0;
                } elseif ($filter == 'sixMonth') {
                    $nb = 6;
                } else {
                    $nb = 12;
                }
            }
            else
            {
                \session()->put('filter', 'all');
                $nb = 0;
            }
        }
        $clients = Client::Clients($nb)->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cin' => 'required|unique:clients,cin',
            'tel' => 'required',
            'attached_file' => 'required'
        ]);
        $client = new Client();
        $client->name = $request->name;
        $client->cin = $request->cin;
        $client->tel = $request->tel;
        $file_name = time() . '.' . $request->attached_file->getClientOriginalExtension();
        $request->attached_file->move(public_path('uploads'), $file_name);
        $client->file = $file_name;
        $client->save();
        session()->flash('success', 'Client a été ajouté avec succès');
        return redirect(route('credit.create', ['client' => $client->id]));

    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $id = $client->id;
        $this->validate($request, [
            'name' => 'required',
            'cin' => 'required|unique:clients,cin,' . $id,
            'tel' => 'required',
        ]);
        $client->name = $request->name;
        $client->cin = $request->cin;
        $client->tel = $request->tel;
        if ($request->hasFile('attached_file')) {
            if (File::exists(public_path('uploads') . '/' . $client->file)) {
                File::delete(public_path('uploads') . '/' . $client->file);
            }
            $file_name = time() . '.' . $request->attached_file->getClientOriginalExtension();
            $request->attached_file->move(public_path('uploads'), $file_name);
            $client->file = $file_name;
        }
        $client->save();
        session()->flash('success', 'Client a été changé avec succès');
        return back();
    }

    public function show(Client $client)
    {
        return view('clients.show', ['client' => $client]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

}
