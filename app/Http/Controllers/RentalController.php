<?php

namespace App\Http\Controllers;

use App\Rental;
use App\RentalPricing;
use App\Sku;
use App\Bike;
use Illuminate\Http\Request;

class RentalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getDiffHours($date1, $date2)
    {
        $date1 = new \DateTime($date1);
        $date2 = new \DateTime($date2);

        $diff = $date2->diff($date1);

        $hours = $diff->h;
        $hours = $hours + ($diff->days * 24);

        return $hours;
    }

    public function pay(Request $request)
    {

        $totalHours = $this->getDiffHours($request->date_start, $request->date_end);
        $totalHours += ($request->time_end - $request->time_start);

        $dataRental = [
            "dateStart" => $request->date_start,
            "timeStart" => $request->time_start,
            "dateEnd" => $request->date_end,
            "timeEnd" => $request->time_end,
            "totalHours" => $totalHours
        ];

        $rentalPricing = RentalPricing::findOrFail($request->category_id);
        $sku = Sku::findOrFail($request->sku_id);
        $bike = Bike::where([['status', '=', 'D'], ['sku_id', '=', $sku->id]])->first();

        return view('rentals.pay', compact(['dataRental', 'rentalPricing', 'sku', 'bike']));
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
