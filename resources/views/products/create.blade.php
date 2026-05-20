@extends('layouts.app')

@section('content')

<div class="product-container">

    <h2>Add Product</h2>

    <form action="{{ route('products.store') }}" method="POST">

        @csrf

        <input type="text" name="name" placeholder="Product Name" required>

        <br><br>

        <input type="number" name="price" placeholder="Product Price" required>

        <br><br>

        <button type="submit">
            Save Product
        </button>

    </form>

</div>

@endsection
