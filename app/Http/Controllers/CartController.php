<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {

        $carts = Session::get('cart');
        return view('eshop.cart.list', compact('carts'));
    }

    public function addToCart($productId)
    {
        $products = Product::findOrFail($productId);
        $oldCart = Session::get('cart');
        $newCart = new Cart($oldCart);
        $newCart->add($products);
        Session::put('cart', $newCart);
        $oldCart = Session::get('cart');
        return redirect()->back();
    }

//    public function updateQuantityProduct(Request $request, $productId)
//    {
//        $product = Product::findOrFail($productId);
//        $oldCart = Session::get('cart');
//
//        $newCart = new Cart($oldCart);
//        $newCart->updateQuantity($product, $request->newQuantity);
//        Session::put('cart', $newCart);
//
//        $data = [
//            'status' => 'success',
//            'message' => 'update successfuly',
//            'cart' => \session('cart'),
//        ];
//        return response()->json($data);
//    }

    public function updateCart(Request $request)
    {
        $newData = $request->all();
        if ($request->id && $request->quantity) {
            $cart = Session::get('cart');
            $cart->items[$newData['id']]['quantity'] = $newData['quantity'];
            Session::put('cart', $cart);
            $carts = Session::get('cart');
            $cartComponent = view('eshop.cart.components.cart_component', compact('carts'))->render();
            return response()->json(['cart_component' => $cartComponent, 'code' => 200], 200);
        }
    }

    public function deleteCart(Request $request)
    {
        $newData = $request->all();
        if ($request->id) {
            $cart = Session::get('cart');
            unset($cart->items[$newData['id']]);
            Session::put('cart', $cart);
            $carts = Session::get('cart');
            $cartComponent = view('eshop.cart.components.cart_component', compact('carts'))->render();
            return response()->json(['cart_component' => $cartComponent, 'code' => 200], 200);
        }
    }
}
