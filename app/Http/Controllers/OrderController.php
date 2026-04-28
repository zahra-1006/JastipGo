<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function store(Request $request) {
        Order::create($request->all());
        return redirect('/');
    }

    public function take($id) {
        $order = Order::find($id);
        $order->pengambil = "Mahasiswa";
        $order->status = "taken";
        $order->save();
        return redirect('/');
    }

    public function done($id) {
        $order = Order::find($id);
        $order->status = "done";
        $order->save();
        return redirect('/');
    }
}
