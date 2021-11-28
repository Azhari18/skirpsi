<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardGoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.goods.index', [
            'goods' => Good::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.goods.create', [
            'categories' => Category::all()
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
            'name' => ['required', 'max:255', 'unique:goods'],
            'price' => ['required', 'max:6'],
            'img' => ['image', 'file', 'max:1024'],
            'category_id' => ['required']
        ]);

        if($request->file('img')){
            $validatedData['img'] = $request->file('img')->store('post-images');
        }

        Good::create($validatedData);
        return redirect('/dashboard/goods')->with('success', 'Data Barang telah berhasil disimpan!');
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
        return view('dashboard.goods.edit', [
            'good' => $good,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Good $good)
    {
        $rules = [
            'price' => ['required', 'max:6'],
            'img' => ['image', 'file', 'max:1024'],
            'category_id' => ['required']
        ];

        if($request->name != $good->name) {
            $rules['name'] = ['required', 'max:255', 'unique:goods'];
        }

        $validatedData = $request->validate($rules);

        if($request->file('img')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['img'] = $request->file('img')->store('post-images');
        }

        Good::where('id', $good->id)->update($validatedData);
        return redirect('/dashboard/goods')->with('success', 'Data Barang telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function destroy(Good $good)
    {
        if($good->img){
            Storage::delete($good->img);
        }
        Good::destroy($good->id);
        return redirect('/dashboard/goods')->with('success', 'Data Barang telah berhasil dihapus!');
    }
}
