<?php

namespace App\Http\Controllers;

use App\Rental;
use App\RentalPricing;
use App\Sku;
use App\Bike;
use App\Attribute;
use App\User;
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


    public function store(Request $request)
    {

        $bike = Bike::findOrFail($request->bike_id);

        if ($bike->status == 'D') {
            $request->validate(
                [
                    'bike_id' => ['required'],
                    'date_start' => ['required'],
                    'date_end' => ['required'],
                    'total_hours' => ['required'],
                    'total_pay' => ['required'],
                    'card_number' => ['required'],
                    'cvv' => ['required']
                ]
            );

            Rental::create([
                'user_id' => auth()->user()->id,
            ] + $request->all());

            $bike->status = 'P';
            $bike->save();

            // $sku = Sku::findOrFile($bike->sku_id);
            // $sku->quantity

            return redirect('alquiler/detalle')->with('status', 'Pagado con éxito');
        }

        return redirect('alquiler/detalle')->with('error', 'La bicicleta ya esta en prestamo');
    }

    public function detail()
    {

        if (auth()->user()->roles[0]->name === 'Admin') {
            $rentals = Rental::all();
        } else {
            $rentals = Rental::where('user_id', '=', auth()->user()->id)->get();
        }

        return view('rentals.details', compact('rentals'));
    }

    public function rentalPDF($id)
    {

        $rental = Rental::findOrFail($id);
        $user = User::findOrFail($rental->user_id);
        $bike = Bike::findOrFail($rental->bike_id);
        $attrs = Attribute::where('sku_id', '=', $bike->sku_id)->get();

        $pdf = \PDF::loadView('rentals.detailPDF', compact(['rental', 'user', 'bike', 'attrs']));
        return $pdf->stream('DetalleAlquiler.pdf');
    }
}
