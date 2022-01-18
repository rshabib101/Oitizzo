<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\food;
use App\Models\place;
use App\Models\District;
use App\Models\category;
use App\Models\User;
use App\Models\message;  
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $districts =District::get();
        $categoreis =category::get();
        $foods =food::latest()->paginate(20);
        $places =place::latest()->paginate(20);
        return view('home',compact('foods','places','districts','categoreis'));
    }
    public function messagepage()
    {
        return view('users.usersedit');
    }
    public function message(Request $request)
    {
        $data = $request->all();
        message::create($data);
        return redirect()->back()
        ->with('success','Created successfully');
    }
}
