<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $sixMonth= Client::CountCredit(6);
        $year= Client::CountCredit(12);
        $count=Client::count();
        return view('dashboard',compact('sixMonth','year','count'));
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
