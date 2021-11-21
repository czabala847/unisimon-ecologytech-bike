<?php

namespace App\Http\Controllers;

use App\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pay(Request $request)
    {

        dd($request);
    }

    public function index()
    {
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Rental $rental)
    {
        //
    }


    public function edit(Rental $rental)
    {
        //
    }


    public function update(Request $request, Rental $rental)
    {
        //
    }


    public function destroy(Rental $rental)
    {
        //
    }
}
