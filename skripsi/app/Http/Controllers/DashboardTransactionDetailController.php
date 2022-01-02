<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class DashboardTransactionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return request('transaction_id');
        // return TransactionDetail::where('transaction_id', request('transaction_id'));
        // $category = TransactionDetail::where('transaction_id', request('transaction_id'));
        return view('dashboard.transactiondetails.index', [
            'details' => TransactionDetail::where('transaction_id', request('transaction_id'))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    // public function show(TransactionDetail $transactionDetail)
    // {
    //     return 'berhasil';
    //     return $transactionDetail;
    //     return $transactionDetail = TransactionDetail::where('transaction_id', );
    //     return view('dashboard.transactiondetails.index', [
    //         'details' => $transactionDetail
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionDetail $transactionDetail)
    {
        //
    }
}
