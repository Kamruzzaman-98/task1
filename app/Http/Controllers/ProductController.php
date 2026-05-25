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
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/products'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imageName,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product Added Successfully');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([

            'name' => 'required|string|max:255',

            'price' => 'required|numeric|min:0',

        ]);

        $product->update([

            'name' => $request->name,

            'price' => $request->price,

        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product Updated Successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product Deleted Successfully');
    }
}
