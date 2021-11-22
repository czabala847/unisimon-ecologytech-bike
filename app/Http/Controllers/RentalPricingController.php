<?php

namespace App\Http\Controllers;

use App\Category;
use App\RentalPricing;
use Illuminate\Http\Request;

class RentalPricingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['pricesView', 'getRentalPricing', 'show']]);
    }

    public function index()
    {
        $prices = RentalPricing::all();
        $categories = Category::all();
        return view("admin/rentals/prices", compact(['prices', 'categories']));
    }

    public function store(Request $request)
    {

        $category = RentalPricing::firstWhere('category_id', $request->category_id);

        if ($category === null) {
            $request->validate(
                [
                    'category_id' => ['required'],
                    'price' => ['required'],
                    'description' => ['required']
                ]
            );

            RentalPricing::create($request->all());

            return back()->with('status', 'Creado con éxito');
        }

        return back()->with('error', 'Ya se creó una tarifa a esta categoría, actualice o cree otra');
    }


    public function show($rentalPricing)
    {

        if (is_numeric($rentalPricing)) {
            $price = RentalPricing::with('category')->findOrFail($rentalPricing);

            return response()->json(
                [
                    'success' => true,
                    'data' => $price
                ],
                200
            );
        }

        return response()->json(
            [
                'success' => false,
                'data' => [],
                'msg' => "id no valido."
            ],
            200
        );
    }

    public function update(Request $request, int $rentalPricing)
    {

        $category = RentalPricing::firstWhere('category_id', $request->category_id);
        $priceUpdate = RentalPricing::find($rentalPricing);
        $valide = false;

        if ($category === null) {
            $valide = true;
        } else if ($priceUpdate->category_id == $request->category_id) {
            $valide = true;
        }

        if ($valide) {
            $priceUpdate->update($request->all());
            return back()->with('status', 'Tarifa editada con éxito');
        }

        return back()->with('error', 'Ya se creó una tarifa a esta categoría, actualice o cree otra');
    }


    public function destroy(int $rentalPricing)
    {
        $priceDelete = RentalPricing::find($rentalPricing);
        $priceDelete->delete();
        // dd($categoryDelete);
        return back()->with('status', 'Tarifa eliminada con éxito');
    }

    public function pricesView()
    {
        $rentalPricing = RentalPricing::all();
        return view("prices", compact('rentalPricing'));
    }

    public function getRentalPricing()
    {

        return RentalPricing::with('category')->get();
    }
}
