<?php

namespace App\Http\Controllers;

use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       $profile=profile::all();
        return view('layouts.dashboard',compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function show(profile $profile)
    {
        
    }

    public function edit(User $profile)
    {
        //$data = User::all();
        return view('users.edit',compact('profile'));
    }

     
    public function update(Request $request,$id)
    {
        // $profile = profile::findOrFail($id);
        // $input = $request->all();
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'foodImage/';
        //     $foodImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $foodImage);
        //     $input['image'] = "$foodImage";
        // }
        // $profile->update($input);
        // return redirect()->route('index')
        //                 ->with('success',' updated successfully');
    }

}
