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

    public function applyPercentage(Request $request)
    {
        $request->validate([
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        $percentage = $request->percentage;

        $products = Product::all();

        $products = $products->map(function ($product) use ($percentage) {

            $increaseAmount = ($product->price * $percentage) / 100;

            $newPrice = $product->price + $increaseAmount;

            $product->selling_price = round($newPrice, 2);

            return $product;
        });

        return view('products.index', compact('products', 'percentage'));
    }
}
