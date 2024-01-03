<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('shop.index', ['shops'=>$shops]);
    }
   
    public function getLatestShopProducts()
    {
        $latestProducts = Product::with(['orders' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->whereHas('orders') 
        ->limit(10)
        ->get();
        $products=[];
        foreach($latestProducts as $product){
            $products[$product->category->id][] = $product;
        }
        //  return $products;
     return view('shop.latest-shop', compact('products'));
    }
    

    public function store(Request $request)
    {
        
    }

    public function show(Shop $shop)
    {
        return view('shop.show', ['shop'=>$shop]);
    }
     
    public function edit(Category $category)
    {
       
    }

    public function update(Request $request, Category $category)
    {
       
    }
    public function destroy(Category $category)
    {
       
    }
}
