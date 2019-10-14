<?php

namespace App\Http\Controllers;

use App\Mail\Credentials;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function edit()
    {
        $user=auth()->user();
        return view('users.edit',compact('user'));
    }

    public function update(Request $request,User $user)
    {
        $this->validate($request,[
            'name'=>'required',
            'password'=>'nullable|min:4',
            'email'=>'required|email'
        ]);
        $data=$request->all();
        $user->name=$data['name'];
        $user->email=$data['email'];
        if($data['password']!=null)
        $user->password=Hash::make($data['password']);
        $user->save();
        session()->flash('success','Votre profil a été mis à jour avec succès');
        try {
            Mail::to($user->email)
                ->send(new Credentials($user->name, $data['password'], $user->email));
        }
        catch (\Exception $exception)
        {}
        return back();
    }
}
