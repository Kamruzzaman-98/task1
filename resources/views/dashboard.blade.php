@extends('layouts.app')

@push('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #eef2f7;
            font-family: 'Segoe UI', sans-serif;
        }

        .dashboard-container {
            width: 100%;
        }

        .dashboard-header {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            border-radius: 24px;
            padding: 55px 45px;
            color: white;
            box-shadow: 0 15px 35px rgba(37, 99, 235, .25);
        }

        .dashboard-header::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, .08);
            border-radius: 50%;
            top: -120px;
            right: -100px;
        }

        .dashboard-header::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, .06);
            border-radius: 50%;
            bottom: -80px;
            left: -80px;
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .dashboard-header h1 {
            font-size: 46px;
            margin-bottom: 12px;
            font-weight: 700;
        }

        .dashboard-header p {
            font-size: 18px;
            opacity: .95;
            max-width: 650px;
            line-height: 1.7;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 22px;
            margin-top: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .05);
            transition: .3s;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(37, 99, 235, .06);
            border-radius: 50%;
            top: -30px;
            right: -30px;
        }

        .stat-icon {
            font-size: 35px;
            margin-bottom: 15px;
        }

        .stat-card h2 {
            font-size: 32px;
            color: #111827;
            margin-bottom: 6px;
        }

        .stat-card p {
            color: #6b7280;
            font-size: 15px;
        }


        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 35px;
        }

        .card {
            background: white;
            border-radius: 22px;
            padding: 35px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
            transition: .3s;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .08);
        }

        .card::before {
            content: '';
            position: absolute;
            width: 130px;
            height: 130px;
            background: rgba(37, 99, 235, .05);
            border-radius: 50%;
            top: -40px;
            right: -40px;
        }

        .card-icon {
            width: 75px;
            height: 75px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            font-size: 38px;
            margin-bottom: 25px;
        }

        .blue {
            background: rgba(37, 99, 235, .12);
        }

        .green {
            background: rgba(16, 185, 129, .12);
        }

        .purple {
            background: rgba(124, 58, 237, .12);
        }

        .orange {
            background: rgba(249, 115, 22, .12);
        }

        .card h3 {
            font-size: 24px;
            color: #111827;
            margin-bottom: 12px;
        }

        .card p {
            color: #6b7280;
            line-height: 1.7;
            margin-bottom: 22px;
            font-size: 15px;
        }

        .card-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: white;
            padding: 13px 22px;
            border-radius: 12px;
            font-weight: 600;
            transition: .3s;
        }

        .btn-blue {
            background: #2563eb;
        }

        .btn-green {
            background: #10b981;
        }

        .btn-purple {
            background: #7c3aed;
        }

        .btn-orange {
            background: #f97316;
        }

        .card-btn:hover {
            transform: translateY(-2px);
            opacity: .95;
        }


        .footer-box {
            margin-top: 40px;
            background: white;
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            color: #6b7280;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .04);
        }

        .footer-box strong {
            color: #111827;
        }

        @media(max-width:768px) {

            .dashboard-header {
                padding: 40px 25px;
            }

            .dashboard-header h1 {
                font-size: 34px;
            }

            .dashboard-header p {
                font-size: 16px;
            }
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .footer-text {
            text-align: center;
            flex: 1;
            color: #6b7280;
            font-size: 15px;
        }

        .logout-form {
            margin: 0;
        }

        .logout-btn {
            background: #ef4444;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
            transition: .3s;
        }

        .logout-btn:hover {
            background: #dc2626;
            transform: translateY(-2px);
        }
    </style>
@endpush


@section('content')
    <div class="dashboard-header">

        <div class="header-content">

            <h1>
                📊 Admin Dashboard
            </h1>

            <p>
                Manage your products, pricing calculations,
                discounts and inventory from one beautiful dashboard.
            </p>

        </div>

    </div>

    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-icon">🛒</div>

            <h2>
                {{ $products->count() ?? 0 }}
            </h2>

            <p>Total Products</p>

        </div>

        <div class="stat-card">

            <div class="stat-icon">💰</div>

            <h2>
                {{ number_format($products->sum('price'), 2) ?? 0 }}
            </h2>

            <p>Total Product Value</p>

        </div>

        <div class="stat-card">

            <div class="stat-icon">📈</div>

            <h2>
                {{ number_format($products->max('price'), 2) ?? 0 }}
            </h2>

            <p>Highest Price</p>

        </div>

        <div class="stat-card">

            <div class="stat-icon">📉</div>

            <h2>
                {{ number_format($products->min('price'), 2) ?? 0 }}
            </h2>

            <p>Lowest Price</p>

        </div>

    </div>

    <div class="dashboard-cards">

        <div class="card">

            <div class="card-icon blue">
                🛒
            </div>

            <h3>All Products</h3>

            <p>
                View and manage all available products.
            </p>

            <a href="{{ route('products.index') }}" class="card-btn btn-blue">

                View Products →

            </a>

        </div>

        <div class="card">

            <div class="card-icon green">
                ➕
            </div>

            <h3>Add Product</h3>

            <p>
                Add new products with pricing and images.
            </p>

            <a href="{{ route('products.create') }}" class="card-btn btn-green">

                Add Product →

            </a>

        </div>

        <div class="card">

            <div class="card-icon purple">
                💸
            </div>

            <h3>Price Calculator</h3>

            <p>
                Calculate discounts and price increases instantly.
            </p>

            <a href="{{ route('products.index') }}" class="card-btn btn-purple">

                Open Calculator →

            </a>

        </div>

        <div class="card">

            <div class="card-icon orange">
                📊
            </div>

            <h3>Reports</h3>

            <p>
                Analyze products and pricing reports.
            </p>

            <a href="#" class="card-btn btn-orange">

                Coming Soon

            </a>

        </div>

    </div>

    <div class="footer-box">

        <div class="footer-content">

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf

                <button type="submit" class="logout-btn">
                    Logout
                </button>

            </form>

            <div class="footer-text">
                🚀 Product Management System Running Smoothly.
            </div>
        </div>
    </div>
@endsection
