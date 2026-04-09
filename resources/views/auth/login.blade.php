<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Novelist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('users/css/bootstrap.min.css') }}">
</head>
<body style="display:flex;justify-content:center;align-items:center;height:100vh;">

<div style="width:350px;">
    <h3>Login</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>

        <button class="btn btn-primary w-100">Login</button>
    </form>

    <div class="text-center mt-3">
        <small>Belum punya akun?</small><br>
        <a href="{{ route('register') }}">Register</a>
    </div>
</div>

</body>
</html>