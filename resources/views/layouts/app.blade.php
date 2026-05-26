<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>

    @stack('styles')

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

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 260px;
            background: #111827;
            color: white;
            padding: 30px 20px;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .sidebar-logo {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 40px;
            text-align: center;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 15px;
        }

        .sidebar-menu a {
            display: block;
            text-decoration: none;
            color: #d1d5db;
            padding: 14px 18px;
            border-radius: 12px;
            transition: .3s;
            font-weight: 500;
        }

        .sidebar-menu a:hover {
            background: #2563eb;
            color: white;
            transform: translateX(5px);
        }

        .sidebar-menu a.active {
            background: #2563eb;
            color: white;
        }


        .main-content {
            flex: 1;
            padding: 30px;
        }


        .sidebar-bottom {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
        }

        .logout-btn {
            width: 100%;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(239, 68, 68, .3);
        }
    </style>

</head>

<body>

    <div class="layout">


        <div class="sidebar">

            <div class="sidebar-logo">
                🛒 Admin Panel
            </div>

            <ul class="sidebar-menu">

                <li>
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        📊 Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('products.index') }}"
                        class="{{ request()->routeIs('products.*') ? 'active' : '' }}">
                        🛒 Products
                    </a>
                </li>

                <li>
                    <a href="{{ route('products.create') }}">
                        ➕ Add Product
                    </a>
                </li>

            </ul>
            <div class="sidebar-bottom">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="logout-btn">
                        🚪 Logout
                    </button>
                </form>
            </div>
        </div>


        <div class="main-content">

            @yield('content')

        </div>

    </div>

    @stack('scripts')

    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif


</body>

</html>
