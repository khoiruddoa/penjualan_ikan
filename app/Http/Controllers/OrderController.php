<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Sell;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sells.orders.index', [
            'orders' => Order::latest()->filter()->paginate(20)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */


    public function create()
    {
        return view('dashboard.sells.orders.create', [
            'customers' => Customer::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'status' => 'required'
        ]);
        Order::create($validatedData);
        return redirect('/dashboard/sells/orders')->with('success', 'transaksi baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('dashboard.sells.orders.show', [
            'order' => $order,
            'categories' => Category::all(),
            'sells' => Sell::where('order_id', $order->id)->get()
        ]);
    }
    public function print(Order $order)
    {
        return view('dashboard.sells.orders.print', [
            'order' => $order,
            'categories' => Category::all(),
            'sells' => Sell::where('order_id', $order->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('dashboard.sells.orders.print', [
            'order' => $order,
            'categories' => Category::all(),
            'sells' => Sell::where('order_id', $order->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // Order::destroy($orders->id);
        // return redirect('/dashboard/sells/orders')->with('success', 'Order deleted!!');
        return $order;
    }
}
