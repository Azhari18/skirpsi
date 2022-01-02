<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
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
            'name' => ['required', 'max:255', 'unique:categories'],            
        ]);

        Category::create($validatedData);
        return redirect('/dashboard/categories')->with('success', 'Data Kategori berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category,            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [];

        if($request->name != $category->name) {
            $rules['name'] = ['required', 'max:255', 'unique:categories'];
        }

        $validatedData = $request->validate($rules);
      
        Category::where('id', $category->id)->update($validatedData);
        return redirect('/dashboard/categories')->with('success', 'Data Kategori telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $goods = Good::where('category_id', $category->id)->first();
        if ($goods) {
            return redirect('/dashboard/categories')->with('failed', 'Ada barang yang masih memiliki kategori ini!');  
        } else {
            Category::destroy($category->id);
            return redirect('/dashboard/categories')->with('success', 'Data kategori berhasil dihapus!');                     
        } 
    }
}
