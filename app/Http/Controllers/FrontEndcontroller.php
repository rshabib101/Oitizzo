<?php

namespace App\Http\Controllers;

use App\Models\food;
use App\Models\place;
use App\Models\District;
use App\Models\category;
use Illuminate\Http\Request;

class FrontEndcontroller extends Controller
{
    public function layout()
    {
        $districts =District::get();
        $categoreis =category::get();
        return view('layouts.app',compact('districts','categoreis'));
    }
    public function food()
    {
        $foods =food::latest()->paginate(50);
        return view('fontend.food',compact('foods'));
    }
    public function place()
    {
        $places =place::latest()->paginate(50);
        return view('fontend.place',compact('places'));
    }
    public function home()
    {
        $districts =District::get();
        $categoreis =category::get();
        $foods =food::latest()->paginate(20);
        $places =place::latest()->paginate(20);
        return view('welcome',compact('foods','places','districts','categoreis'));
    }
    public function search(Request $request){
   
        $districts =District::get();
        $categoreis =category::get();
        $search = $request->input('search');
        $foods = food::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('district_name', 'LIKE', "%{$search}%")
            ->get();
        $places = place::query()
        ->where('name', 'LIKE', "%{$search}%")
        ->orWhere('description', 'LIKE', "%{$search}%")
        ->orWhere('district_name', 'LIKE', "%{$search}%")
        ->get();
        return view('search', compact('places','foods','districts','categoreis'));

    }
}
