<?php

namespace App\Http\Controllers;

use App\Bike;
use App\Category;
use Illuminate\Http\Request;

class BikeController extends Controller
{

    public function index()
    {
        $bikes = Bike::all();
        $categories = Category::all();
        return view('admin/bikes/index', compact('bikes', 'categories'));
    }

    public function create()
    {
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
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function show(Bike $bike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function edit(Bike $bike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bike $bike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bike $bike)
    {
        //
    }
}
