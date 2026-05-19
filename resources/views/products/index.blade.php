@extends('layouts.app')

@section('content')

<style>
    body{
        background: #f4f6f9;
        font-family: Arial, sans-serif;
    }

    .product-container{
        width: 90%;
        max-width: 1100px;
        margin: 40px auto;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .title{
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }

    .discount-form{
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 30px;
    }

    .discount-form input{
        width: 200px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
    }

    .discount-form button{
        background: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: 0.3s;
    }

    .discount-form button:hover{
        background: #218838;
    }

    table{
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
        border-radius: 10px;
    }

    table thead{
        background: #343a40;
        color: white;
    }

    table th,
    table td{
        padding: 15px;
        text-align: center;
    }

    table tbody tr{
        border-bottom: 1px solid #ddd;
        transition: 0.3s;
    }

    table tbody tr:hover{
        background: #f1f1f1;
    }

    .original-price{
        color: #dc3545;
        font-weight: bold;
    }

    .percentage{
        color: #007bff;
        font-weight: bold;
    }

    .selling-price{
        color: #28a745;
        font-size: 18px;
        font-weight: bold;
    }

    .badge{
        background: #007bff;
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 14px;
    }
</style>

<div class="product-container">

    <h1 class="title">🛒 Product Price Calculator</h1>

    <form method="POST" action="{{ route('products.discount') }}" class="discount-form">
        @csrf

        <input
            type="number"
            name="discount"
            placeholder="Enter Percentage %"
            value="{{ $discount ?? '' }}"
            min="0"
            required
        >

        <button type="submit">
            Apply Percentage
        </button>
    </form>

    <table>

        <thead>
            <tr>
                <th>Product Name</th>
                <th>Original Price</th>
                <th>Added %</th>
                <th>New Selling Price</th>
            </tr>
        </thead>

        <tbody>

            @foreach($products as $product)

            <tr>

                <td>
                    {{ $product->name }}
                </td>

                <td class="original-price">
                    {{ number_format($product->price, 2) }} Tk
                </td>

                <td>
                    <span class="badge">
                        {{ $discount ?? 0 }}%
                    </span>
                </td>

                <td class="selling-price">

                    @if(isset($product->selling_price))

                        {{ number_format($product->selling_price, 2) }} Tk

                    @else

                        {{ number_format($product->price, 2) }} Tk

                    @endif

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection
