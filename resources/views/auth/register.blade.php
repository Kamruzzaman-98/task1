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
        .register-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* Card */
        .register-card {
            width: 100%;
            max-width: 500px;
            background: rgba(255, 255, 255, 0.97);
            border-radius: 28px;
            padding: 45px 35px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.18);
            position: relative;
            overflow: hidden;
        }

        /* Decorative circles */
        .register-card::before,
        .register-card::after {
            content: '';
            position: absolute;
            border-radius: 50%;
        }

        .register-card::before {
            width: 220px;
            height: 220px;
            background: rgba(37, 99, 235, 0.08);
            top: -100px;
            right: -80px;
        }

        .register-card::after {
            width: 180px;
            height: 180px;
            background: rgba(124, 58, 237, 0.08);
            bottom: -90px;
            left: -90px;
        }

        /* Content */
        .register-content {
            position: relative;
            z-index: 2;
        }

        .register-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .register-header h1 {
            font-size: 32px;
            color: #111827;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .register-header p {
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

        .register-input {
            width: 100%;
            padding: 14px 18px;
            border-radius: 14px;
            border: 1px solid #d1d5db;
            background: #f9fafb;
            font-size: 15px;
            transition: .3s;
        }

        .register-input:focus {
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

        /* Footer link + button */
        .register-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
        }

        .login-link {
            font-size: 14px;
            font-weight: 600;
            color: #2563eb;
            text-decoration: none;
            transition: 0.3s;
        }

        .login-link:hover {
            color: #1d4ed8;
        }

        .register-btn {
            padding: 15px 25px;
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

        .register-btn:hover {
            transform: translateY(-2px);
            opacity: 0.96;
        }

        /* Responsive */
        @media(max-width: 500px) {
            .register-card {
                padding: 35px 20px;
            }

            .register-header h1 {
                font-size: 28px;
            }

            .register-header p {
                font-size: 14px;
            }
        }
    </style>

    <div class="register-wrapper">
        <div class="register-card">
            <div class="register-content">

                <div class="register-header">
                    <h1>Price Calculation System</h1>
                    <p>Create an account to manage products, pricing calculations, and reports.</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="input-group">
                        <label for="name" class="input-label">Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required
                            autofocus autocomplete="name" class="register-input" placeholder="Your full name">
                        <x-input-error :messages="$errors->get('name')" class="error-text" />
                    </div>

                    <!-- Email -->
                    <div class="input-group">
                        <label for="email" class="input-label">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autocomplete="username" class="register-input" placeholder="Enter your email">
                        <x-input-error :messages="$errors->get('email')" class="error-text" />
                    </div>

                    <!-- Password -->
                    <div class="input-group">
                        <label for="password" class="input-label">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="register-input" placeholder="Enter your password">
                        <x-input-error :messages="$errors->get('password')" class="error-text" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="input-group">
                        <label for="password_confirmation" class="input-label">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            autocomplete="new-password" class="register-input" placeholder="Confirm your password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="error-text" />
                    </div>

                    <div class="register-footer">
                        <a class="login-link" href="{{ route('login') }}">Already registered?</a>
                        <button type="submit" class="register-btn">Register →</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-guest-layout>
