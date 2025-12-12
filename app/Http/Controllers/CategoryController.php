<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequeswtStore;
use App\Http\Requests\categoryRequeswtUpdate;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

      $categories=Category::with('blogs:id,title')->get();


      return view('categories.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()

    {
        return view('categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(categoryRequeswtStore $request)
    {

        $name=$request->validated();

        Category::create($name);

        return redirect()->route('blogs.index');

    }

    /**
     * Display the specified resource.
     */

    public function show(Category $category)
    {

        $categories=$category->get();//return only one

        return view('categories.index',compact('categories'));

    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Category $category)
    {

       return view('categories.update',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(categoryRequeswtUpdate $request, Category $category)
    {

        $data=$request->validated();

       $cate=$category->update($data);

     return redirect()->route('categories.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)

    {//dd($category);
        $category->delete();

       return redirect()->route('blogs.index');

    }
}

