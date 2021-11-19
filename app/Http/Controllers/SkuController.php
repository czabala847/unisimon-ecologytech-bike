<?php

namespace App\Http\Controllers;

use App\Sku;
use App\Category;
use App\Attribute;
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


    public function store(Request $request)
    {
        $sku = Sku::firstWhere('sku', $request->sku);

        if ($sku === null) {

            $request->validate(
                [
                    'category_id' => ['required'],
                    'sku' => ['required', 'unique:skus'],
                    'name' => ['required'],
                    'price' => ['required'],
                    'image' => ['required'],
                    'color' => ['required'],
                    'brake' => ['required'],
                    'rin' => ['required'],
                    'speed' => ['required']
                ]
            );

            $sku = Sku::create(
                [
                    'quantity' => 0
                ] +
                    $request->all()
            );

            //Guardar archivos
            if ($request->file('image')) {

                $image = $request->file('image');
                $nameImage = md5(time() . $image->getClientOriginalName());
                $nameImage = $nameImage . "." . $image->getClientOriginalExtension();
                $route = public_path() . '/images/upload';

                $image->move($route, $nameImage);
                $sku->image = $nameImage;
            }

            if ($sku->id) {

                $arrAttr = ['color', 'brake', 'rin', 'speed'];

                foreach ($arrAttr as $attr) {
                    //Insertar en BD los atributos
                    Attribute::create([
                        'sku_id' => $sku->id,
                        'attribute' => $attr,
                        'value' => $request->$attr
                    ]);
                }
            }

            $sku->save();

            return back()->with('status', 'Creado con éxito');
        }

        return back()->with('error', 'Ya existe el SKU');
    }

    public function show(Sku $sku)
    {
        //
    }

    public function edit(Sku $sku)
    {
        //
    }

    public function update(Request $request, Sku $sku)
    {
        //
    }

    public function destroy(int $sku)
    {
        $skuDelete = Sku::find($sku);
        $skuDelete->delete();

        Attribute::where('sku_id', $sku)->delete();

        // dd($categoryDelete);
        return back()->with('status', 'SKU eliminado con éxito');
    }
}
