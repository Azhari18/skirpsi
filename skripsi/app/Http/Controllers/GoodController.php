<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Http\Requests;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('good');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255', 'unique:goods'],
            'price' => ['required', 'min:3', 'max:6'], 
            'category_id' => ['required'],
            'img' => ['required']
        ]);

        Good::create($validatedData);

        // return redirect('/login');
        

        // $request->session()->flash('success', 'Registration successful! Please login');

        // return redirect('/login')->with('success', 'Registration successful! Please login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function show(Good $good)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function edit(Good $good)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGoodRequest  $request
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function destroy(Good $good)
    {
        //
    }
}
