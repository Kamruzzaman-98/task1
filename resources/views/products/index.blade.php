@extends('layouts.app')

@push('styles')
    <style>
        .container-box {
            width: 100%;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .header h1 {
            font-size: 32px;
            color: #111827;
        }

        .header p {
            color: #6b7280;
            margin-top: 5px;
        }

        .back-btn {
            background: #111827;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 10px;
            transition: .3s;
            font-weight: 600;
        }

        .back-btn:hover {
            background: #1f2937;
        }

        .main-card {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .05);
        }

        .top-actions {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .search-box {
            flex: 1;
            min-width: 250px;
        }

        .search-box input {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid #d1d5db;
            border-radius: 12px;
            outline: none;
            font-size: 15px;
            transition: .3s;
        }

        .search-box input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .1);
        }

        .discount-form {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .discount-form input {
            padding: 14px 18px;
            border: 1px solid #d1d5db;
            border-radius: 12px;
            width: 180px;
            outline: none;
            font-size: 15px;
        }

        .btn {
            border: none;
            padding: 14px 20px;
            border-radius: 12px;
            color: white;
            cursor: pointer;
            font-weight: 600;
            transition: .3s;
        }

        .btn-add {
            background: #10b981;
        }

        .btn-discount {
            background: #ef4444;
        }

        .btn:hover {
            transform: translateY(-2px);
            opacity: .95;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        thead {
            background: #111827;
            color: white;
        }

        th {
            padding: 18px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 18px;
            border-bottom: 1px solid #e5e7eb;
            color: #374151;
        }

        tbody tr {
            transition: .3s;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        .product-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .product-image {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            object-fit: cover;
        }

        .product-name {
            font-weight: 600;
            color: #111827;
        }

        .product-id {
            color: #6b7280;
            font-size: 13px;
            margin-top: 4px;
        }

        .price {
            color: #ef4444;
            font-weight: bold;
        }

        .selling-price {
            color: #10b981;
            font-weight: bold;
            font-size: 16px;
        }

        .badge {
            display: inline-block;
            padding: 7px 14px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            color: white;
        }

        .badge-add {
            background: #2563eb;
        }

        .badge-discount {
            background: #ef4444;
        }

        @media(max-width:768px) {

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .top-actions {
                flex-direction: column;
            }

            .discount-form {
                width: 100%;
            }

            .discount-form input,
            .discount-form button {
                width: 100%;
            }
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .edit-btn {
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            transition: .3s;
            border: none;
        }

        .edit-btn:hover {
            background: #1d4ed8;
        }

        .delete-btn {
            background: #ef4444;
            color: white;
            border: none;
            padding: 10px 14px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: .3s;
        }

        .delete-btn:hover {
            background: #dc2626;
        }

        .edit-btn:hover,
        .delete-btn:hover {
            transform: translateY(-2px);
        }

        body.dark-mode {
            background: #111827;
            color: white;
        }

        body.dark-mode .main-card {
            background: #1f2937;
        }

        body.dark-mode th {
            background: #000;
        }

        body.dark-mode td {
            color: #f3f4f6;
            border-bottom: 1px solid #374151;
        }

        body.dark-mode .product-name,
        body.dark-mode h1 {
            color: white;
        }

        body.dark-mode .product-id,
        body.dark-mode p {
            color: #d1d5db;
        }

        body.dark-mode .search-box input,
        body.dark-mode .discount-form input {
            background: #374151;
            color: white;
            border: 1px solid #4b5563;
        }

        body.dark-mode .search-box input::placeholder,
        body.dark-mode .discount-form input::placeholder {
            color: #d1d5db;
        }

        body.dark-mode tbody tr:hover {
            background: #374151;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .modal-content {
            background: #fff;
            width: 500px;
            padding: 25px;
            border-radius: 16px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .close {
            font-size: 28px;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 10px;
        }
    </style>
@endpush

@section('content')
    <div class="container-box">

        <div class="header">

            <a href="{{ route('dashboard') }}" class="back-btn">
                ← Go Dashboard
            </a>

            <div>
                <h1>🛒 Product List</h1>
                <p>Manage your product prices easily</p>
            </div>

            <button type="button" class="back-btn" id="openProductModal">
                ➕ Add Product
            </button>

        </div>

        <div class="main-card">

            <div class="top-actions">

                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="🔍 Search Product...">
                </div>

                <form method="POST" action="{{ route('products.percentage') }}" class="discount-form">

                    @csrf

                    <input type="number" name="percentage" placeholder="Enter Percentage %" min="0" required>

                    <button type="submit" name="action" value="add" class="btn btn-add">

                        ➕ Add Price

                    </button>

                    <button type="submit" name="action" value="discount" class="btn btn-discount">

                        ➖ Discount

                    </button>

                </form>

            </div>

            <div class="table-wrapper">

                <table id="productTable">

                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Original Price</th>
                            <th>Type</th>
                            <th>New Selling Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($products as $product)
                            <tr>

                                <td>

                                    <div class="product-info">

                                        <img src="{{ $product->image ? asset('uploads/products/' . $product->image) : 'https://via.placeholder.com/55' }}"
                                            class="product-image">

                                        <div>

                                            <div class="product-name">
                                                {{ $product->name }}
                                            </div>

                                            <div class="product-id">
                                                Product ID:
                                                #{{ $product->id }}
                                            </div>

                                        </div>

                                    </div>

                                </td>

                                <td class="price">
                                    {{ number_format($product->price) }} Tk
                                </td>

                                <td>

                                    @if (isset($action) && $action == 'discount')
                                        <span class="badge badge-discount">
                                            Discount {{ $percentage ?? 0 }}%
                                        </span>
                                    @else
                                        <span class="badge badge-add">
                                            Added {{ $percentage ?? 0 }}%
                                        </span>
                                    @endif

                                </td>

                                <td class="selling-price">

                                    @if (isset($product->selling_price))
                                        {{ number_format($product->selling_price) }} Tk
                                    @else
                                        {{ number_format($product->price) }} Tk
                                    @endif

                                </td>
                                <td>

                                    <div class="action-buttons">

                                        <button type="button" class="edit-btn openEditModal" data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                                            data-image="{{ $product->image ? asset('uploads/products/' . $product->image) : asset('images/no-image.png') }}">
                                            Edit
                                        </button>

                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            onsubmit="return confirmDelete()">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="delete-btn">
                                                Delete
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div id="productModal" class="modal">

        <div class="modal-content">

            <div class="modal-header">
                <h2>➕ Add Product</h2>
                <span class="close" id="closeModal">&times;</span>
            </div>

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="name" required>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" required>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image">
                </div>

                <button type="submit" class="submit-btn">Save Product</button>

            </form>

        </div>

    </div>

    <div id="editModal" class="modal">

        <div class="modal-content">

            <div class="modal-header">
                <h2>✏️ Edit Product</h2>
                <span class="close" id="closeEditModal">&times;</span>
            </div>

            <form id="editForm" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="name" id="editName" required>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" id="editPrice" required>
                </div>

                <div class="form-group">
                    <label>Current Image</label>

                    <img id="previewImage" src="" alt="Product Image"
                        style="
                                width:100px;
                                height:100px;
                                object-fit:cover;
                                border-radius:10px;
                                display:block;
                                margin-bottom:10px;
                            ">
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image">
                </div>

                <button type="submit" class="submit-btn">
                    Update
                </button>

            </form>

        </div>

    </div>

    <script src="{{ asset('js/products.js') }}"></script>
@endsection
