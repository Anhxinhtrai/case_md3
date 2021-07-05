<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::paginate(6);
        return view('eshop.home',compact('products'));
    }

    public function showDetail($id)
    {
        $product = Product::find($id);
        return view('eshop.product-details',compact('product'));
    }
}
