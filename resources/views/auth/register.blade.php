<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Novelist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('users/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/font-awesome.min.css') }}">

    <style>
        body {
            margin: 0;
            height: 100vh;
            background: radial-gradient(circle at top, #1a1a2e, #0f0f0f);
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .register-box {
            width: 100%;
            max-width: 380px;
            padding: 40px 35px;
            border-radius: 16px;
            background: rgba(20,20,20,0.85);
            backdrop-filter: blur(12px);
            box-shadow: 0 0 40px rgba(124,77,255,0.15);
            border: 1px solid rgba(255,255,255,0.05);
        }

        .register-box h3 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 25px;
            color: #fff;
        }

        .form-control {
            background: #111;
            border: 1px solid #2a2a2a;
            color: #fff;
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 14px;
        }

        .form-control:focus {
            border-color: #7c4dff;
            box-shadow: 0 0 0 2px rgba(124,77,255,0.2);
            background: #111;
            color: #fff;
        }

        .btn-primary {
            width: 100%;
            border-radius: 10px;
            padding: 12px;
            border: none;
            font-weight: 600;
            background: linear-gradient(135deg, #7c4dff, #5a32c2);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(124,77,255,0.3);
        }

        .alert {
            border-radius: 8px;
            font-size: 14px;
        }

        .text-center small {
            color: #aaa;
        }

        a {
            color: #7c4dff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-box">
    <h3>Daftar Novelist</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <input type="text" name="name" class="form-control" placeholder="Nama" required>
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>

        <button type="submit" class="btn btn-primary">
            Register
        </button>
    </form>

    <div class="text-center mt-4">
        <small>Sudah punya akun?</small><br>
        <a href="{{ route('login') }}">Login sekarang</a>
    </div>
</div>

</body>
</html>