<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Buy;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard.suppliers.index',
            [
                'suppliers' => Supplier::latest()->paginate(10)->withQueryString()
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
        return view('dashboard.suppliers.create');
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
            'nik' => 'required|unique:suppliers',
            'name' => 'required|max:150',
            'address' => 'required',
            'phone_number' => 'required|unique:suppliers'
        ]);
        Supplier::create($validatedData);
        return redirect('/dashboard/suppliers')->with('success', 'Supplier baru telah ditambahkan');
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
    public function edit(Supplier $supplier)
    {
        return view('dashboard.suppliers.edit', [
            'supplier' => $supplier
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $rules = [
            'name' => 'required|max:150',
            'address' => 'required'
        ];
        if ($request->nik != $supplier->nik) {
            $rules['nik'] = 'required|unique:suppliers';
        }
        if ($request->phone_number != $supplier->phone_number) {
            $rules['phone_number'] = 'required|unique:suppliers';
        }
        $validatedData = $request->validate($rules);

        Supplier::where('id', $supplier->id)->update($validatedData);
        return redirect('/dashboard/suppliers')->with('success', 'Supplier sudah di-update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {

        $buy = Buy::where('supplier_id', $supplier->id)->first();
        if ($buy != null) {
            if ($buy->supplier_id == $supplier->id) {
                return redirect('/dashboard/suppliers')->with('failed', 'supplier tidak bisa dihapus. karena sudah ada transaksi');
            }
        }
        Supplier::destroy($supplier->id);
        return redirect('/dashboard/suppliers')->with('success', 'supplier deleted!!');
    }
}
