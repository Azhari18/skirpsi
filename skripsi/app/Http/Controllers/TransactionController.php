<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        $goods = Good::with(['category'])->latest();

        if(request('search')){
            $goods->where('name', 'like', '%' . request('search') . '%')
                  ->orWhere('id', request('search'));
        }
        
        return view('transaction', [
            "goods" =>$goods->get()
        ]);
    }
}
