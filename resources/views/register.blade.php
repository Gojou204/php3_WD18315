<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mb-3">Form đăng ký</h3>
        @if (session('message'))
            <p class="text-danger">{{ session('message') }}</p>
        @endif
        <form action="{{ route('postRegister') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button class="btn btn-primary">Đăng ký</button>
        </form>
        <a href="{{ route('login') }}">Đăng nhập</a>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>