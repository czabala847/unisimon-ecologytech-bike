<?php

namespace App\Http\Controllers;

use App\Sku;
use App\Category;
use Illuminate\Http\Request;

class SkuController extends Controller
{

    public function index()
    {
        $skus = Sku::all();
        return view('admin/skus/index', compact('skus'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin/skus/create', compact('categories'));
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
     * @param  \App\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function show(Sku $sku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function edit(Sku $sku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sku $sku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sku $sku)
    {
        //
    }
}
