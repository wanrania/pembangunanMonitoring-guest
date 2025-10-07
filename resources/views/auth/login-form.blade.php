<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card">
    <div class="card-body">
        <h5 class="card-title">Form Pertanyaan</h5>
        <form action="{{ route('auth.login') }}" method="POST">
	     @csrf

         <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                <textarea class="form-control" rows="4" name="pertanyaan"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pertanyaan</button>
        </form>
    </div>
</div>
</div>

</body>
</html>
