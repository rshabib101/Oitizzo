<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registration; 
use App\Models\category;
use App\Http\Requests\registrationRequest;
use Illuminate\Support\Facades\Session;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{

    public function index()
    {
        $data = registration::latest()->paginate(10);
        return view('registration.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $districts = District::all();
        return view('registration.create',compact('categories','districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(registrationRequest $request)
    {
        $admin = registration::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'number' => $request['number'],
            'district_id' => $request['district_id'],
            'category_id' => $request['category_id'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('registrations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(registration $registration)
    {
        $data = category::get();
        return view('registration.edit',compact('category','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(registrationRequest $request, registration $registration)
    {
        // $data = $request->all();
        // $category->update($data);
        // return redirect()->route('registration.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(registration $registration)
    {
        if ($category) {
			$category->delete();
			Session::flash('Deleted successfully');
		}
		return redirect()->back();
    }
}
