<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Novelist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('users/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/font-awesome.min.css') }}">

    <style>
        body {
            margin: 0;
            height: 100vh;
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 20px;
            background: #ffffff;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        }

        .login-box h3 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 25px;
            color: #2d3748;
        }

        .form-control {
            border-radius: 12px;
            padding: 14px;
            border: 1px solid #e2e8f0;
            margin-bottom: 15px;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99,102,241,0.2);
        }

        .btn-primary {
            width: 100%;
            border-radius: 12px;
            padding: 14px;
            border: none;
            font-weight: 600;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            transition: 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(99,102,241,0.3);
        }

        .text-center small {
            color: #6b7280;
        }

        a {
            color: #4f46e5;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h3>Login Novelist</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>

        <button type="submit" class="btn btn-primary">
            Login
        </button>
    </form>

    <div class="text-center mt-4">
        <small>Belum punya akun?</small><br>
        <a href="{{ route('register') }}">Daftar sekarang</a>
    </div>
</div>

<script src="{{ asset('users/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('users/js/bootstrap.min.js') }}"></script>

</body>
</html> 