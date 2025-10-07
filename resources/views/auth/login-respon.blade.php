<!DOCTYPE html>
<html>
<head>
    <title>Respon Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success-subtle">

<div class="container mt-5">
    <div class="card shadow-sm border-success">
        <div class="card-body">
            <h4 class="card-title text-success">Login Berhasil 🎉</h4>
            <p><strong>Username:</strong> {{ $username }}</p>
            <p><strong>Password:</strong> {{ $password }}</p>
            <hr>
            <p class="text-muted">Selamat datang di halaman respon login.</p>
            <a href="{{ url('/auth') }}" class="btn btn-outline-success">Kembali ke Login</a>
        </div>
    </div>
</div>

</body>
</html>
