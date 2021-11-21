<?php

namespace App\Http\Controllers;

use App\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Attribute $attribute)
    {
        //
    }

    public function edit(Attribute $attribute)
    {
        //
    }

    public function update(Request $request, Attribute $attribute)
    {
        //
    }

    public function destroy(Attribute $attribute)
    {
        //
    }

    public function getAttributes(int $idSku)
    {
        $attribute = Attribute::with('Sku')->where('sku_id', $idSku)->get();

        return response()->json(
            [
                'success' => true,
                'data' => $attribute
            ],
            200
        );
    }
}
