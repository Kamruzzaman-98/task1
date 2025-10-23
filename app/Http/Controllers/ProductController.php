<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function applyDiscount(Request $request)
    {
        $discount = $request->input('discount');

        
        $request->validate([
            'discount' => 'required|numeric|min:0|max:100',
        ]);

        $products = Product::all();

      
        $discountedProducts = $products->map(function($product) use ($discount) {
            $discountAmount = ($product->price * $discount) / 100;
            $product->discounted_price = round($product->price - $discountAmount, 2);
            return $product;
        });

        return view('products.index', [
            'products' => $discountedProducts,
            'discount' => $discount
        ]);
    }
}
