<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->with('products')->get();

        return view('order.index', compact('orders'));
    }

    public function create($shopId)
    {
        $shop = Shop::findOrFail($shopId);
        $products = $shop->products;
        return view('order.create', compact('shop', 'products'));
    }

    public function store(Request $request, $shopId)
   {

    $shop = Shop::findOrFail($shopId);
    $order = new Order();
    $order->shop()->associate($shop);
    $order->user_id = Auth::id();
    $order->save();

    foreach ($request->input('products') as $productId => $quantity) {
        if ($quantity > 0) {
            $product = Product::findOrFail($productId);
            $order->products()->attach($product, ['quantity' => $quantity]);
        }
    }

    return redirect()->route('shop.show', ['shop' => $shopId])->with('success', 'Order placed successfully!');
  }
}
