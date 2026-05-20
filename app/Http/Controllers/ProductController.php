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
        $percentage = $request->percentage;
        $action = $request->action;

        $products = Product::all();

        foreach ($products as $product) {

            if ($action == 'add') {

                $product->selling_price =
                    $product->price +
                    ($product->price * $percentage / 100);
            } elseif ($action == 'discount') {

                $product->selling_price =
                    $product->price -
                    ($product->price * $percentage / 100);
            }
        }

        return view('products.index', compact(
            'products',
            'percentage',
            'action'
        ));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Product Added Successfully');
    }
}
