<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\District;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userApprove($id)
    {
        $user = User::findOrFail($id); 
        return view('admin.useraprove',compact('user'));
    }

    public function index()
    {
        //$user = User::findOrFail($id); 
        $users = User::all();
        return view('users.index',compact('users'))->with('i');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required', 'confirmed',
           ]);
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->number = $request->input('number');
        $user->password = Hash::make($request->input('password'));
       $user->save();
        return redirect()->back()
        ->with('success','Updated successfully');
    }


    public function destroy($id)
    {
        //
    }
}
