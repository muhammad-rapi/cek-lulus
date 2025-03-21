<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Kelulusan SMKN1 Binjaii</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="container text-center">
        <h1 class="mb-1">Selamat Datang di Portal Cek Kelulusan</h1>
        <h2 class="mb-4">SMKN 1 Binjai</h2>
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('check.graduation') }}" method="POST" class="bg-white p-4 rounded shadow">
            @csrf
            <div class="mb-3">
                <input type="text" name="nisn" class="form-control" placeholder="Masukkan NISN" required>
            </div>
            <button type="submit" class="btn btn-primary">Cek lulus</button>
        </form>
    </div>
</body>

</html
