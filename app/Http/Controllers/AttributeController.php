<?php

namespace App\Http\Controllers;

use App\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{

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
