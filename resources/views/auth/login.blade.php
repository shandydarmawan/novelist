<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Novelist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS USER -->
    <link rel="stylesheet" href="{{ asset('users/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/style.css') }}">

    <style>
        body {
            background: #0b0c10;
            color: #fff;
        }
        .login-box {
            max-width: 420px;
            margin: 80px auto;
            background: #15171c;
            padding: 30px;
            border-radius: 8px;
        }
        .login-box h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-control {
            background: #1f2229;
            border: none;
            color: #fff;
        }
        .form-control:focus {
            background: #1f2229;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h3>Login</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Login
        </button>
    </form>

    <div class="text-center mt-3">
        <small>Belum punya akun?</small><br>
        <a href="{{ route('register') }}">Daftar sekarang</a>
    </div>
</div>

<!-- JS USER -->
<script src="{{ asset('users/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('users/js/bootstrap.min.js') }}"></script>

</body>
</html>
