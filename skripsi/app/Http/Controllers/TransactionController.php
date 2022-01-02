<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\TransactionDetail;
use SebastianBergmann\Environment\Console;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Good::with(['category'])->latest();

        if (request('search')) {
            $goods->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('id', request('search'));
        }

        return view('dashboard.transactions.index', [
            "goods" => $goods->get(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.transactions.show', [
            "transactions" => Transaction::latest()->get()
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
        $validatedDataTransaction = $request->validate([
            'total' => ['required'],
            'customer_paid' => ['required'],
            'change' => ['required'],
        ]);

        if ($request->change >= 0) {
            $validatedDataTransaction['description'] = 'Lunas';
        } else {
            $validatedDataTransaction['description'] = 'Hutang';
        }

        Transaction::create($validatedDataTransaction);

        $transaction = Transaction::latest()->first();
        $transactionId = $transaction->id;

        // ================================================================


        foreach (explode(',', $request->good_quantity) as $row) {
            if ($row != 0) {
                $good_quantity[] = $row;
            }
        }

        foreach (explode(',', $request->good_total) as $row) {
            if ($row != 0) {
                $good_total[] = $row;
            }
        }

        foreach (explode(',', $request->good_id) as $row) {
            if ($row != 0) {
                $good_id[] = $row;
            }
        }

        $count = count($good_id);

        for ($i = 0; $i < $count; $i++) {
            $detail['quantity'] = $good_quantity[$i];
            $detail['sub_total'] = $good_total[$i];
            $detail['good_id'] = $good_id[$i];
            $detail['transaction_id'] = $transactionId;
            TransactionDetail::create($detail);
        }

        if ($request->change >= 0) {
            return redirect('/transaction')->with('success', 'Transaksi berhasil dilakukan!');
        } else {
            return redirect('/dashboard/debts/create')->with(['transaction_id' => $transactionId, 'customers' => Customer::all()]);                 
            // return view('dashboard.debts.create', [
            //     'transaction_id' => $transactionId,
            //     'customers' => Customer::all()
            // ]);            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
