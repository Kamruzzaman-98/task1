@extends('layouts.app')

@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #eef2f7;
        }

        .page-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .form-card {
            width: 100%;
            max-width: 550px;
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .08);
            position: relative;
            overflow: hidden;
        }

        .form-card::before {
            content: '';
            position: absolute;
            width: 250px;
            height: 250px;
            background: rgba(37, 99, 235, .05);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .form-header {
            position: relative;
            z-index: 2;
            text-align: center;
            margin-bottom: 35px;
        }

        .form-header h1 {
            font-size: 36px;
            color: #111827;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #6b7280;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 22px;
            position: relative;
            z-index: 2;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #374151;
        }

        input {
            width: 100%;
            padding: 15px 18px;
            border: 1px solid #d1d5db;
            border-radius: 14px;
            font-size: 15px;
            outline: none;
            transition: .3s;
            background: #f9fafb;
        }

        input:focus {
            border-color: #2563eb;
            background: white;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .1);
        }

        .submit-btn {
            width: 100%;
            border: none;
            padding: 16px;
            border-radius: 14px;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, .25);
        }

        .back-btn {
            display: inline-block;
            margin-top: 18px;
            text-decoration: none;
            color: #6b7280;
            transition: .3s;
            font-size: 15px;
        }

        .back-btn:hover {
            color: #111827;
        }

        .error-text {
            color: #ef4444;
            font-size: 14px;
            margin-top: 8px;
        }

        .current-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 16px;
            margin-top: 10px;
            border: 4px solid #e5e7eb;
        }
    </style>

    <div class="page-wrapper">

        <div class="form-card">

            <div class="form-header">

                <h1>✏ Edit Product</h1>

                <p>Update your product information</p>

            </div>

            <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="form-group">

                    <label>Product Name</label>

                    <input type="text" name="name" value="{{ $product->name }}" placeholder="Enter product name">

                    @error('name')
                        <div class="error-text">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group">

                    <label>Product Price</label>

                    <input type="number" name="price" value="{{ $product->price }}" placeholder="Enter product price">

                    @error('price')
                        <div class="error-text">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group">

                    <label>Product Image</label>

                    <input type="file" name="image" accept="image/*">

                    @if ($product->image)
                        <img src="{{ asset('uploads/products/' . $product->image) }}" class="current-image">
                    @endif

                    @error('image')
                        <div class="error-text">{{ $message }}</div>
                    @enderror

                </div>

                <button type="submit" class="submit-btn">
                    Update Product 🚀
                </button>

            </form>

            <center>
                <a href="{{ route('products.index') }}" class="back-btn">
                    ← Back to Products
                </a>
            </center>

        </div>

    </div>
@endsection
