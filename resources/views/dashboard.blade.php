@extends('layouts.app')

@section('content')

<style>
    body {
        margin: 0;
        padding: 0;
        background: #f4f6f9;
        font-family: Arial, sans-serif;
    }

    .dashboard-container {
        width: 90%;
        max-width: 1200px;
        margin: 50px auto;
    }

    .dashboard-header {
        background: linear-gradient(135deg, #007bff, #6610f2);
        color: white;
        padding: 40px;
        border-radius: 18px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .dashboard-header h1 {
        margin: 0;
        font-size: 42px;
    }

    .dashboard-header p {
        margin-top: 10px;
        font-size: 18px;
        opacity: 0.9;
    }

    .dashboard-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-top: 35px;
    }

    .card {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: 0.3s;
        text-align: center;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    }

    .card-icon {
        font-size: 45px;
        margin-bottom: 15px;
    }

    .card h3 {
        margin-bottom: 10px;
        color: #333;
    }

    .card p {
        color: #777;
        font-size: 15px;
    }

    .card a {
        display: inline-block;
        margin-top: 15px;
        text-decoration: none;
        background: #007bff;
        color: white;
        padding: 10px 18px;
        border-radius: 8px;
        transition: 0.3s;
    }

    .card a:hover {
        background: #0056b3;
    }
</style>

<div class="dashboard-container">

    <div class="dashboard-header">
        <h1>📊 Welcome to Dashboard</h1>
        <p>Manage your products, prices and calculations easily.</p>
    </div>

    <div class="dashboard-cards">

        <div class="card">
            <div class="card-icon">🛒</div>
            <h3>All Products</h3>
            <p>View and manage all available products.</p>

            <a href="{{ route('products.index') }}">
                View Products
            </a>
        </div>

        <div class="card">
            <div class="card-icon">➕</div>
            <h3>Add Product</h3>
            <p>Create and save a new product quickly.</p>

            <a href="{{ route('products.create') }}">
                Add Product
            </a>
        </div>

        <div class="card">
            <div class="card-icon">💰</div>
            <h3>Price Calculator</h3>
            <p>Calculate discount or added percentage.</p>

            <a href="{{ route('products.index') }}">
                Calculate Price
            </a>
        </div>

    </div>

</div>

@endsection
