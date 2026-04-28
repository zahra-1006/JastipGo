<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Order;

// HALAMAN AWAL
Route::get('/', function () {
    return redirect('/login');
});

// LOGIN SYSTEM (Breeze)
require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $orders = Order::latest()->get();
        return view('dashboard', compact('orders'));
    });

    Route::get('/orders/create', function () {
        return view('orders.create');
    });

    Route::post('/orders', function (Request $request) {

        Order::create([
            'item_name' => $request->item_name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect('/dashboard');
    });

    Route::get('/orders/{id}/edit', function ($id) {
    $order = \App\Models\Order::findOrFail($id);
    return view('orders.edit', compact('order'));
    });

    Route::post('/orders/{id}/update', function (Illuminate\Http\Request $request, $id) {

    $order = \App\Models\Order::findOrFail($id);

    $order->update([
        'item_name' => $request->item_name,
        'price' => $request->price,
        'description' => $request->description,
    ]);

    return redirect('/dashboard')->with('success', 'Order berhasil diupdate!');
    });

    Route::get('/orders/{id}/delete', function ($id) {

    $order = \App\Models\Order::findOrFail($id);
    $order->delete();

    return redirect('/dashboard')->with('success', 'Order dihapus!');
    });
Route::middleware(['auth'])->group(function () {

    Route::get('/settings', function () {
        return view('settings');
    });
});

Route::middleware(['auth'])->group(function () {

    Route::get('/settings', function () {
        return view('settings');
    });

Route::middleware(['auth'])->group(function () {

    Route::get('/settings', function () {
        return view('settings');
    });

});

});
});
