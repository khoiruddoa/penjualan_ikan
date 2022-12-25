<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view(
            'dashboard.customers.index',
            [
                'customers' => Customer::latest()->filter()->paginate(20)->withQueryString()

            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.customers.create');
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
            'nik' => 'required|unique:customers',
            'name' => 'required|max:150',
            'address' => 'required',
            'phone_number' => 'required|unique:customers'
        ]);
        Customer::create($validatedData);
        return redirect('/dashboard/customers')->with('success', 'Customer baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('dashboard.customers.edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $rules = [
            'name' => 'required|max:150',
            'address' => 'required'
        ];
        if ($request->nik != $customer->nik) {
            $rules['nik'] = 'required|unique:customers';
        }
        if ($request->phone_number != $customer->phone_number) {
            $rules['phone_number'] = 'required|unique:customers';
        }
        $validatedData = $request->validate($rules);

        Customer::where('id', $customer->id)->update($validatedData);
        return redirect('/dashboard/customers')->with('success', 'Customer sudah di-update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $order = Order::where('customer_id', $customer->id)->first();
        if ($order != null) {
            if ($order->customer_id == $customer->id) {
                return redirect('/dashboard/customers')->with('failed', 'customer tidak bisa dihapus. karena sudah ada transaksi');
            }
        }
        Customer::destroy($customer->id);
        return redirect('/dashboard/customers')->with('success', 'customer deleted!!');
    }
}
