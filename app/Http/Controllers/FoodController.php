<?php

namespace App\Http\Controllers;

use App\Models\food;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\District;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $foods =food::latest()->paginate(30);
        return view('food.index',compact('foods'))->with('i');
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
        return view('food.create',compact('categories','districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'foodImage/';
        //     $foodImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $foodImage);
        //     $input['image'] = "$foodImage";
        // }
        // food::create($input);
        $path = $request->file('image')->store('public/images');
        $post = new food;
        $post->user_id = $request->user_id;
        $post->district_id = $request->district_id;
        $post->category_id = $request->category_id;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->district_name = $request->district_name;
        $post->price = $request->price;
        $post->image = $path;
        $post->save();
        return redirect()->route('foods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\food  $food
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = food::findOrFail($id);
        return view('food.show',compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = food::findOrFail($id);
        return view('food.edit',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $post = food::findOrFail($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $post->image = $path;
        }
        $post->user_id = $request->user_id;
        $post->district_id = $request->district_id;
        $post->category_id = $request->category_id;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->district_name = $request->district_name;
        $post->price = $request->price;
        $post->save();
        return redirect()->route('foods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(food $food)
    {
        $food->delete();
        return redirect()->route('foods.index')
        ->with('success','Food has been deleted successfully');
    }
}
