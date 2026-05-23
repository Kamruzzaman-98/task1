<x-guest-layout>

    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Wrapper */
        .login-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* Card */
        .login-card {
            width: 100%;
            max-width: 450px;
            background: rgba(255, 255, 255, 0.97);
            border-radius: 28px;
            padding: 40px 30px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.18);
            position: relative;
            overflow: hidden;
        }

        /* Decorative circles */
        .login-card::before,
        .login-card::after {
            content: '';
            position: absolute;
            border-radius: 50%;
        }

        .login-card::before {
            width: 220px;
            height: 220px;
            background: rgba(37, 99, 235, 0.08);
            top: -100px;
            right: -80px;
        }

        .login-card::after {
            width: 180px;
            height: 180px;
            background: rgba(124, 58, 237, 0.08);
            bottom: -90px;
            left: -90px;
        }

        /* Content */
        .login-content {
            position: relative;
            z-index: 2;
        }

        .login-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .login-header h1 {
            font-size: 32px;
            color: #111827;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .login-header p {
            color: #6b7280;
            font-size: 15px;
            line-height: 1.7;
        }

        /* Inputs */
        .input-group {
            margin-bottom: 22px;
        }

        .input-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
            color: #374151;
        }

        .login-input {
            width: 100%;
            padding: 14px 18px;
            border-radius: 14px;
            border: 1px solid #d1d5db;
            background: #f9fafb;
            font-size: 15px;
            transition: .3s;
        }

        .login-input:focus {
            outline: none;
            border-color: #2563eb;
            background: white;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }

        .error-text {
            color: #ef4444;
            font-size: 13px;
            margin-top: 6px;
        }

        /* Remember + Forgot */
        .remember-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #6b7280;
        }

        .remember-me input {
            width: 16px;
            height: 16px;
            accent-color: #2563eb;
        }

        .forgot-link {
            font-size: 14px;
            font-weight: 600;
            color: #2563eb;
            text-decoration: none;
            transition: 0.3s;
        }

        .forgot-link:hover {
            color: #1d4ed8;
        }

        /* Button */
        .login-btn {
            width: 100%;
            padding: 15px;
            border-radius: 14px;
            border: none;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            color: white;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.25);
            transition: .3s;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            opacity: 0.96;
        }

        .footer-text {
            margin-top: 28px;
            text-align: center;
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
        }

        /* Responsive */
        @media(max-width: 500px) {
            .login-card {
                padding: 30px 20px;
            }

            .login-header h1 {
                font-size: 28px;
            }

            .login-header p {
                font-size: 14px;
            }
        }
    </style>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-content">

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="login-header">
                    <h1>Price Calculation System</h1>
                    <p>Login to manage products, pricing calculations, discounts, and reports.</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="input-group">
                        <label for="email" class="input-label">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autofocus autocomplete="username" class="login-input" placeholder="Enter your email">
                        <x-input-error :messages="$errors->get('email')" class="error-text" />
                    </div>

                    <!-- Password -->
                    <div class="input-group">
                        <label for="password" class="input-label">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="login-input" placeholder="Enter your password">
                        <x-input-error :messages="$errors->get('password')" class="error-text" />
                    </div>

                    <!-- Remember + Forgot -->
                    <div class="remember-section">
                        <label class="remember-me" for="remember_me">
                            <input id="remember_me" type="checkbox" name="remember"> Remember Me
                        </label>

                        @if (Route::has('password.request'))
                            <a class="forgot-link" href="{{ route('password.request') }}">Forgot Password?</a>
                        @endif
                    </div>

                    <!-- Button -->
                    <button type="submit" class="login-btn">Login →</button>
                </form>

                <div class="footer-text">
                    🚀 Secure Admin Portal for Product & Price Management
                </div>

            </div>
        </div>
    </div>

</x-guest-layout>
