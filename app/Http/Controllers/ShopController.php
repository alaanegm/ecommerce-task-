<?php

namespace App\Http\Controllers;
use App\Models\Shop;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        //
        $shops = Shop::all();
         
        return view('shop.index', ['shops'=>$shops]);
    }
   
    public function create()
    { 
        $categories = Category::all();
        return view('category.create', ['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:5'],
        ], [
            'name.required' => 'Category must have a name',
            'name.min' => 'Category name should be at least 5 characters',
        ]);
        if ($validator->fails()) {
            return redirect()->route('category.create')
                ->withErrors($validator)
                ->withInput();
        }
        $data_request=$request->all();
         Category::create($data_request);
        return to_route('category.index');
    }

    public function show(Shop $shop)
    {
        return view('shop.show', ['shop'=>$shop]);
    }
     
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('category.edit',["category"=>$category,'categories'=>$categories]);
    }

    public function update(Request $request, Category $category)
    {
        $request_data = $request->all();
        $category->update($request_data);
        return to_route('category.show', $category->id);  
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
