@extends('layouts.app')

@section('content')
    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .product-container {
            width: 90%;
            max-width: 500px;
            margin: 60px auto;
            background: #fff;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .product-title {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 30px;
        }

        .product-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .product-form input {
            padding: 14px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
            transition: 0.3s;
        }

        .product-form input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        }

        .save-btn {
            background: #28a745;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-size: 17px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
        }

        .save-btn:hover {
            background: #218838;
            transform: translateY(-2px);
        }

        .back-btn {
            display: block;
            width: fit-content;
            margin: 20px auto 0;
            text-decoration: none;
            background: #007bff;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            transition: 0.3s;
            text-align: center;
        }

        .back-btn:hover {
            background: #0056b3;
        }
    </style>

    <div class="product-container">

        <h2 class="product-title">➕ Add New Product</h2>

        <form action="{{ route('products.store') }}" method="POST" class="product-form">

            @csrf

            <input type="text" name="name" placeholder="Enter Product Name" required>

            <input type="number" name="price" placeholder="Enter Product Price" required>

            <button type="submit" class="save-btn">
                💾 Save Product
            </button>

        </form>
        <a href="{{ route('products.index') }}" class="back-btn">
            ← Back To Products
        </a>

    </div>
@endsection
