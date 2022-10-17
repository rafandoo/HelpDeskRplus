<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('search');
        if ($search) {
            $categories = Category::where([
                ['description', 'like', '%' . $search . '%']
            ])->paginate(10);
        } else {
            $categories = Category::paginate(10);
        }
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('category.index')->with('success', 'Categoria cadastrada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Category::findOrFail($id)->update($request->all());
        return redirect()->route('category.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Change the status of the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $category = Category::findOrFail($id);
        if ($category->active == 1) {
            $category->active = 0;
        } else {
            $category->active = 1;
        }
        $category->save();
        return redirect()->route('category.index')->with('success', 'Situação alterada com sucesso!');
    }
}
