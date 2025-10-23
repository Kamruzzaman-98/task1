@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product List</h1>

    <form method="POST" action="{{ route('products.discount') }}" class="mb-4">
        @csrf
        <label for="discount">Enter Discount %:</label>
        <input type="number" name="discount" id="discount" value="{{ $discount ?? '' }}" min="0" max="100" required>
        <button type="submit">Apply</button>
    </form>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Discounted Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price, 2) }}</td>
                <td>
                    @if(isset($product->discounted_price))
                        {{ number_format($product->discounted_price, 2) }}
                    @else
                        -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
