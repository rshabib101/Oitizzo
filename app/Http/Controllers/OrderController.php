<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request){
        $input =$request->all();
        Order::create($input);
        return redirect()->route('orderdetail');
        // $data = $request->all();
        // return Order::create([
        //     'user_id' => $data['user_id'],
        //     'name' => $data['name'],
        //     'price' => $data['price'],
        //     'quantity' => $data['quantity'],
        // ]);
        // $name  = $request->name;
        // //$quantity  = $request->quantity;
        // $input = implode(", ", $name);
        // //$input = implode(", ", $quantity);
        
    }
    public function orderdetail(){
        $orders = Order::latest()->paginate(30);
        return view('order.order',compact('orders'))->with('i');
    }
}
