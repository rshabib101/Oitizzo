<?php

namespace App\Http\Controllers;

use App\Models\place;
use App\Models\category;
use App\Models\District;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $places =place::latest()->paginate(2);
        return view('place.index',compact('places'))->with('i');
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
        return view('place.create',compact('categories','districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $data = $request->all();
        // // if ($image = $request->file('image')) {
        // //     $destinationPath = 'placeImage/';
        // //     $pImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        // //     $image->move($destinationPath, $pImage);
        // //     $input['image'] = "$pImage";
        // // }
        $this->validate($request, [
    		'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        // $request->image->move(public_path('images'), $input['image']);
        // $input['user_id'] = $request->user_id;
        // $input['district_id'] = $request->district_id;
        // $input['category_id '] = $request->category_id;
        // $input['name'] = $request->name;
        // $input['description'] = $request->description;
        // place::create($input);
        $path = $request->file('image')->store('public/images');
        $post = new place;
        $post->user_id = $request->user_id;
        $post->district_id = $request->district_id;
        $post->category_id = $request->category_id;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->district_name = $request->district_name;
        $post->image = $path;
        $post->save();

        return redirect()->route('places.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(place $place)
    {

        return view('place.show',compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(place $place)
    {
        return view('place.edit',compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $post = place::findOrFail($id);
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
        $post->save();
        return redirect()->route('places.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(place $place)
    {
        $place->delete();
        return redirect()->route('places.index')
        ->with('success','Food has been deleted successfully');
    }
}
