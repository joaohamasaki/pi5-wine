<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        return view('category.index')->with('categories', Category::all());
    }


    public function create()
    {
        return view ('category.create');
    }

    public function store(Request $request)
    {
        Category::create ($request->all());
        session()->flash('success','Categoria foi cadastrada com sucesso!');
        return redirect(route('category.index'));
    }


    public function show(Category $category)
    {
        return view('category.show')->with(['category' => $category, 'products' => $category->product()->paginate(3)]);
    }

    public function edit(Category $category)
    {
        return view('category.edit')->with('category', $category);
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        session()->flash('success','A Categoria foi alterada com sucesso!');
        return redirect( route('category.index') );
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success','A Categoria foi apagada com sucesso!');
        return redirect( route('category.index') );
    }
}
