<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.0.2-dist\css\bootstrap.min.css">

    <title>Selamat Datang</title>
</head>

<body>

    @include('template.nav')

    <div class="container mt-5">
        <form action="{{ route('postlog') }}" method="POST">
            @csrf
            @if (Session::has('status1'))
                <div class="alert alert-secondary mt-3"><span>{{ Session::get('status1') }}</span></div>
            @endif
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="username" autofocus required class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" required class="form-control">
            </div>
            @if (Session::has('status'))
                <div><span style="color: red">{{ Session::get('status') }}</span></div>
            @endif
            <button type="submit" class="btn btn-success mt-3">Login</button>
            <a href="{{ route('reg') }}" class="btn btn-primary mt-3">Register</a>
        </form>
    </div>

</body>

</html>
