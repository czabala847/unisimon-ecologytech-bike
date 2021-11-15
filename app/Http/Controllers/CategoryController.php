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

    public function create()
    {
        //
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

    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        //
    }


    public function update(Request $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        //
    }
}
