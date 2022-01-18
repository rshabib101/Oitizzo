<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\User;
use App\Models\District;
use Illuminate\Http\Request;
use App\Models\message; 

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
       return view('admin.userlist',compact('users'))->with('i');
    }
    public function messageshow()
    {
       $messages = message::all();
       return view('admin.message',compact('messages'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();   
        return view('admin.useraprove',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        $users = User::all();   
        return view('admin.useraprove',compact('admin','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();   
        $user =User::findOrFail($id);
        return view('admin.useraprove',compact('user','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user =User::findOrFail($id);
        $data = $request->all();
        $user->update($data);
        return redirect()->route('adminactions.index')->with('user','data');
       // return view('admin.useraprove',compact('user'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
