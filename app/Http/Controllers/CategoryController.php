<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{

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

        Category::create(['status' => 'A'] + $request->all());

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
        $categoryDelete->delete();
        // dd($categoryDelete);
        return back()->with('status', 'Categoría eliminada con éxito');
    }
}
