<?php

namespace App\Http\Controllers;

use App\Bike;
use App\Sku;
use Illuminate\Http\Request;

class BikeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }


    public function index()
    {
        $bikes = Bike::all();
        $skus = Sku::all();
        return view('admin/bikes/index', compact('bikes', 'skus'));
    }

    public function store(Request $request)
    {

        $bike = Bike::firstWhere('code', $request->code);

        if ($bike === null) {
            $request->validate(
                [
                    'sku_id' => ['required'],
                    'code' => ['required'],
                ]
            );

            Bike::create($request->all());

            $sku = Sku::find($request->sku_id);
            $newQuantity = $sku->quantity + 1;

            $sku->quantity = $newQuantity;
            $sku->save();


            return back()->with('status', 'Creado con éxito');
        }

        return back()->with('error', 'El código ingresado ya existe.');
    }

    public function show(int $bike)
    {
        $bikeShow = Bike::findOrFail($bike);

        return response()->json(
            [
                'success' => true,
                'data' => $bikeShow
            ],
            200
        );
    }

    public function update(Request $request, int $bike)
    {
        $bikeUpdate = Bike::find($bike);

        if ($bikeUpdate->sku_id != $request->sku_id) {
            $newSku = Sku::find($request->sku_id);
            $oldSku = Sku::find($bikeUpdate->sku_id);

            $newSku->quantity = $newSku->quantity + 1;
            $oldSku->quantity = $oldSku->quantity - 1;

            $newSku->save();
            $oldSku->save();
        }

        $bikeUpdate->update($request->all());

        return back()->with('status', 'Bicicleta editada con éxito');
    }


    public function destroy(int $bike)
    {
        $bikeDelete = Bike::find($bike);
        $sku = Sku::find($bikeDelete->sku_id);

        if ($bikeDelete->rentals->count() > 0) {

            return back()->with('error', 'No se puede eliminar la bicicleta porque actualmente esta en prestamo.');
        }


        $bikeDelete->delete();

        $sku->quantity = $sku->quantity - 1;
        $sku->save();

        return back()->with('status', 'Bicicleta eliminada con éxito');
    }
}
