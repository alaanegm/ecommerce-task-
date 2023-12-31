<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        //
        $products = Product::paginate(6);
         
        return view('product.index', ['products'=>$products]);
    }
   
    public function create()
    { 
        $categories=Category::all();
        return view('product.create', ['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name"=>"required|min:5",
            "description"=>"required",
            "price"=>"required",
            "image"=>"required"
        ], [
            "name.required"=>"name  is required",
            'name.min'=>'name  must be at least 5 chars.'
        ]);
        if ($validator->fails()) {
            return redirect()->route('product.create')
                ->withErrors($validator)
                ->withInput();
        }
        $data_request=$request->all();
        Product::create($data_request);
        return to_route('product.index');
    }

    public function show(Product $product)
    {
        return view('product.show', ['product'=>$product]);
    }
     
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('product.edit',["product"=>$product,'categories'=>$categories]);
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            "name"=>"required|min:5",
            "description"=>"required",
            "price"=>"required",
            "image"=>"required"
        ], [
            "name.required"=>"name  is required",
            'name.min'=>'name  must be at least 5 chars.'
        ]);
        if ($validator->fails()) {
            return redirect()->route('product.create')
                ->withErrors($validator)
                ->withInput();
        }
        $request_data = $request->all();
        $product->update($request_data);
        return to_route('product.show', $product->id);  
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'product deleted successfully');
    }
}
