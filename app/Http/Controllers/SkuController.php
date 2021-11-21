<?php

namespace App\Http\Controllers;

use App\Sku;
use App\Category;
use App\Attribute;
use Illuminate\Http\Request;

class SkuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['skusForCategory']]);
    }


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
        $sku = Sku::findOrFail($sku->id);
        $categories = Category::all();

        $attributes = Attribute::where('sku_id', '=', $sku->id)->get();
        // dd($attributes[0]);

        return view('admin/skus/edit', compact(['categories', 'sku', 'attributes']));
    }

    public function update(Request $request, Sku $sku)
    {
        $sku->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
        ]);

        // si viene con file
        if ($request->file('image')) {
            $image = $request->file('image');
            $nameImage = md5(time() . $image->getClientOriginalName());
            $nameImage = $nameImage . "." . $image->getClientOriginalExtension();
            $route = public_path() . '/images/upload';

            $image->move($route, $nameImage);
            $sku->image = $nameImage;
        }

        $sku->save();

        $attributes = Attribute::where('sku_id', '=', $sku->id)->get();

        $color = Attribute::find($attributes[0]->id);
        $color->value = $request->color;
        $color->save();

        $brake = Attribute::find($attributes[1]->id);
        $brake->value = $request->brake;
        $brake->save();

        $rin = Attribute::find($attributes[2]->id);
        $rin->value = $request->rin;
        $rin->save();

        $speed = Attribute::find($attributes[3]->id);
        $speed->value = $request->speed;
        $speed->save();

        return back()->with('status', 'SKU editado con éxito');
    }

    public function destroy(int $sku)
    {
        $skuDelete = Sku::find($sku);

        if ($skuDelete->bikes->count() > 0) {

            return back()->with('error', 'No se puede eliminar el SKU porque esta siendo usado en una bicicleta.');
        }

        $skuDelete->delete();

        Attribute::where('sku_id', $sku)->delete();

        // dd($categoryDelete);
        return back()->with('status', 'SKU eliminado con éxito');
    }

    public function skusForCategory(int $idCategory)
    {

        $skus = Sku::where('category_id', '=', $idCategory)->get();
        return response()->json(
            [
                'success' => true,
                'data' => $skus
            ],
            200
        );
    }
}
