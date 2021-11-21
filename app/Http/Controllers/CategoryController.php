<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $categories = Category::all();
        return view('admin/categories/index', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => ['required'],
                'description' => ['required']
            ]
        );

        Category::create($request->all());

        return back()->with('status', 'Creado con éxito');
    }

    public function show(int $category)
    {
        $category = Category::findOrFail($category);

        return response()->json(
            [
                'success' => true,
                'data' => $category
            ],
            200
        );
    }


    public function update(Request $request, int $category)
    {
        $categoryUpdate = Category::find($category);
        $categoryUpdate->update($request->all());
        return back()->with('status', 'Categoría editada con éxito');
    }


    public function destroy(int $category)
    {
        $categoryDelete = Category::find($category);

        if ($categoryDelete !== null) {

            if ($categoryDelete->skus->count() > 0 || $categoryDelete->rentalPricings->count() > 0) {

                return back()->with('error', 'No se puede eliminar la categoría porque esta siendo usanda en una referencia o en un plan de prestamos.');
            }

            $categoryDelete->delete();
            return back()->with('status', 'Categoría eliminada con éxito');
        }

        // dd($categoryDelete);

    }
}
