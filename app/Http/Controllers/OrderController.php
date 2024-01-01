<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create($shopId)
    {
        $shop = Shop::findOrFail($shopId);
        $products = $shop->products;
        return view('order.create', compact('shop', 'products'));
    }

    public function store(Request $request, $shopId)
    {
        // Validate the request here

        $shop = Shop::findOrFail($shopId);

        $order = new Order();
        $order->shop()->associate($shop);
        
        $products = [];
        return $request->input('products');
        foreach ($request->input('products') as $productId => $quantity) {
            if ($quantity > 0) {
                $products[] = [
                    'product_id' => $productId,
                    'quantity' => $quantity,
                ];
            }
        }

        $order->product_details = json_encode($products);
        $order->save();

        return redirect()->route('shop.show', ['shop' => $shopId])->with('success', 'Order placed successfully!');
    }
}
