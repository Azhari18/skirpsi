<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Debt;
use Illuminate\Http\Request;

class DashboardCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.customers.index', [
            'customers' => Customer::latest()->get()
        ]);
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
            'name' => ['required', 'max:255', 'unique:customers'],
            'phone_number' => ['required', 'max:13'],            
            'address' => ['required']
        ]);

        Customer::create($validatedData);
        return redirect('/dashboard/customers')->with('success', 'Data Customer telah berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('dashboard.customers.edit', [
            'customer' => $customer,            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $rules = [
            'phone_number' => ['required', 'max:13'],            
            'address' => ['required']
        ];

        if($request->name != $customer->name) {
            $rules['name'] = ['required', 'max:255', 'unique:goods'];
        }

        $validatedData = $request->validate($rules);
      
        Customer::where('id', $customer->id)->update($validatedData);
        return redirect('/dashboard/customers')->with('success', 'Data customer telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {    
        $debts = Debt::where('customer_id', $customer->id)->first();
        if ($debts) {
            return redirect('/dashboard/customers')->with('failed', 'Pelanggan masih memiliki hutang!');  
        } else {
            Customer::destroy($customer->id);
            return redirect('/dashboard/customers')->with('success', 'Data customer telah berhasil dihapus!');                     
        } 
    }
}
