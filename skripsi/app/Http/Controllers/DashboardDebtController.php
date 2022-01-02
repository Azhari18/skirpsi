<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Transaction;

class DashboardDebtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.debts.index', [
            'debts' => Debt::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaction = Transaction::latest()->first();
        $transactionId = $transaction->id;

        return view('dashboard.debts.create', [            
            'transaction_id' => $transactionId,
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
            'transaction_id' => ['required', 'unique:debts'],
            'customer_id' => ['required']            
        ]);

        Debt::create($validatedData);
        Transaction::where('id', $request->transaction_id)->update(['description' => 'Hutang']);        
        return redirect('/dashboard/debts')->with('success', 'Data Hutang telah berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function show(Debt $debt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function edit(Debt $debt)
    {
        return view('dashboard.debts.edit', [
            'debt' => $debt,
            'customers' => Customer::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Debt $debt)
    {
        $rules = [
            'transaction_id' => ['required'],            
            'customer_id' => ['required']
        ];

        $validatedData = $request->validate($rules);
        
        Transaction::where('id', $debt->transaction_id)->update(['description' => 'Lunas']);        
        Transaction::where('id', $request->transaction_id)->update(['description' => 'Hutang']);        
        Debt::where('id', $debt->id)->update($validatedData);
        return redirect('/dashboard/debts')->with('success', 'Data Hutang telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debt $debt)
    {        
        Debt::destroy($debt->id);
        Transaction::where('id', $debt->transaction_id)->update(['description' => 'Lunas']);
        return redirect('/dashboard/debts')->with('success', 'Data Hutang telah berhasil dihapus!');
    }
}
