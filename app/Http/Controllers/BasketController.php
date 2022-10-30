<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket(){
        $order =
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        }
        return view('basket', ['order' => $order]);
    }
    public function basketConfirm(Request $request){
        $orderId = session('orderId');
        if (is_null($orderId)){
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        if ($order->status == 0) {
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->status = 1;
            $order->save();
            session()->forget('orderId');
        }
        return redirect()->route('index');
    }
    public function basketPlace(){
        $orderId = session('orderId');
        if (is_null($orderId)){
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        return view('order', ['order'=>$order]);
    }

    public function basketAdd($productId){
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create()->id;
            session(['orderId' => $order]);
        } else {
            $order = Order::find($orderId);
        }
        if ($order->products->contains($productId)) {
            $selectedProduct = $order->products()->where('product_id', $productId)->first()->pivot;
            $selectedProduct->count++;
            $selectedProduct->update();
        } else {
            $order->products()->attach($productId);
        }
        return redirect()->route('basket');
    }
    public function basketRemove($productId){
        $orderId = session('orderId');
        $order = Order::find($orderId);
        if ($order->products->contains($productId)) {
            $selectedProduct = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($selectedProduct->count < 2) {
                $order->products()->detach($productId);
            } else {
                $selectedProduct->count--;
                $selectedProduct->update();
            }
        }
        return redirect()->route('basket');
    }
}
