```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login EO - Payakumbuh Event Hub</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .login-box {
            background: white;
            padding: 35px;
            border-radius: 15px;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.10);
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo h1 {
            margin: 0;
            color: #16a34a;
            font-size: 28px;
        }

        .logo p {
            margin-top: 8px;
            color: #666;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px 14px;

            border: 1px solid #d1d5db;
            border-radius: 8px;

            font-size: 14px;
            outline: none;
        }

        input:focus {
            border-color: #16a34a;
        }

        .login-button {
            width: 100%;
            padding: 13px;

            border: none;
            border-radius: 8px;

            background: #16a34a;
            color: white;

            font-size: 16px;
            font-weight: bold;

            cursor: pointer;
        }

        .login-button:hover {
            background: #15803d;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;

            padding: 12px;
            margin-bottom: 18px;

            border-radius: 8px;

            font-size: 14px;
        }

        .back-home {
            text-align: center;
            margin-top: 20px;
        }

        .back-home a {
            color: #16a34a;
            text-decoration: none;
            font-size: 14px;
        }

        .back-home a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-container">

        <div class="login-box">

            <div class="logo">
                <h1>Payakumbuh Event Hub</h1>
                <p>Login Event Organizer</p>
            </div>

            @if ($errors->any())
                <div class="error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="email">Email</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Masukkan email"
                        value="{{ old('email') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                    >
                </div>

                <button type="submit" class="login-button">
                    Login
                </button>

            </form>

            <div class="back-home">
                <a href="{{ route('home') }}">
                    â† Kembali ke Beranda
                </a>
            </div>

        </div>

    </div>

</body>
</html>
```
