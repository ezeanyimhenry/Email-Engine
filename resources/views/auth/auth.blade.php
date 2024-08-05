<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #1e1e1e;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 300px;
        }

        h2 {
            margin-top: 0;
            color: #bb86fc;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            margin-bottom: 1rem;
            padding: 0.5rem;
            border: none;
            border-radius: 4px;
            background-color: #2c2c2c;
            color: #e0e0e0;
        }

        button {
            background-color: #bb86fc;
            color: #000;
            border: none;
            border-radius: 4px;
            padding: 0.5rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #9966cc;
        }

        .switch {
            margin-top: 1rem;
            text-align: center;
        }

        .switch a {
            color: #03dac6;
            text-decoration: none;
        }

        .switch a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="login-form">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <x-text-input id="email" placeholder="Email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <x-text-input id="password" placeholder="Password" class="block mt-1 w-full" type="password"
                    name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <!-- Remember Me -->
                <div>
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span>{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div style="margin-bottom: 10px;">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="color: #03dac6">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
                <button type="submit">Login</button>
            </form>
            <div class="switch">
                Don't have an account? <a href="#" id="show-register">Register</a>
            </div>
        </div>

        <div id="register-form" style="display: none;">
            <h2>Register</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <x-text-input id="name" placeholder="Full Name" class="block mt-1 w-full" type="text"
                    name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <x-text-input id="email" placeholder="Email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <x-text-input id="password" placeholder="Password" class="block mt-1 w-full" type="password"
                    name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <x-text-input id="password_confirmation" placeholder="Confirm Password" class="block mt-1 w-full"
                    type="password" name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                <div class="flex items-center justify-end mt-4">
                    <a style="color:#03dac6" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                </div>
                <button type="submit">Register</button>
            </form>
            <div class="switch">
                Already have an account? <a href="#" id="show-login">Login</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const showRegister = document.getElementById('show-register');
            const showLogin = document.getElementById('show-login');

            function updateFormDisplay() {
                const currentPath = window.location.pathname;
                if (currentPath.includes('register')) {
                    loginForm.style.display = 'none';
                    registerForm.style.display = 'block';
                } else {
                    loginForm.style.display = 'block';
                    registerForm.style.display = 'none';
                }
            }

            // Add event listeners for links
            showRegister.addEventListener('click', (e) => {
                e.preventDefault();
                window.history.pushState({}, '', '{{ route('register') }}');
                updateFormDisplay();
            });

            showLogin.addEventListener('click', (e) => {
                e.preventDefault();
                window.history.pushState({}, '', '{{ route('login') }}');
                updateFormDisplay();
            });

            // Check path on page load
            updateFormDisplay();
        });
    </script>

</body>

</html>
