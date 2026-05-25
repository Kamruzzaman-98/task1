@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Edit Product</h1>

        <form method="POST" action="{{ route('products.update', $product->id) }}">

            @csrf
            @method('PUT')

            <div>

                <label>Product Name</label>

                <input type="text" name="name" value="{{ $product->name }}">

            </div>

            <br>

            <div>

                <label>Price</label>

                <input type="number" name="price" value="{{ $product->price }}">

            </div>

            <br>

            <button type="submit">

                Update Product

            </button>

        </form>

    </div>
@endsection
