<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('auth.orders.index', ['orders'=>Order::where('status','>', 0)->orderBy('status')->get()]);
    }
    public function show(Order $order){
        return view('auth.orders.show', ['order'=>$order]);
    }
    public function completed(Order $order){
        $order->status = 2;
        $order->save();
        return redirect()->route('home');
    }
    public function canceled(Order $order){
        $order->status = 3;
        $order->save();
        return redirect()->route('home');
    }
}
