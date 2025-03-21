<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kelulusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .motivasi {
            font-style: italic;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .btn-custom {
            transition: 0.3s;
        }

        .btn-custom:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100"
    style="background-color: {{ $student ? ($student->is_graduated ? '#cfe2ff' : '#D84040') : '#f8d7da' }};">
    <div class="container text-center p-5 rounded shadow bg-white">
        @error('error')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if ($student->is_graduated)
            <h1 class="mb-3 text-primary">🎉 Selamat! 🎉</h1>
            <p class="mt-3 text-dark">
                Berdasarkan syarat dan ketentuan kelulusan, maka : 
            </p>
            <h3 class="text-dark">{{ $student->name }} ({{ $student->nisn }})</h3>
            <h4 class="text-dark">Tahun Pelajaran 2024/2025</h4>
            <h5 class="text-dark">Dinyatakan</h5>
            <h1 class="text-success">Lulus</h1>
        @else
            <h1 class="mb-3 text-danger">💪 Jangan Menyerah! 💪</h1>
            <p class="mt-3 text-dark">
                Berdasarkan syarat dan ketentuan kelulusan, maka : 
            </p>
            <h3 class="text-dark">{{ $student->name }} ({{ $student->nisn }})</h3>
            <h4 class="text-dark">Tahun Pelajaran 2024/2025</h4>
            <h5 class="text-dark">Dinyatakan</h5>
            <h1 class="text-danger">Tidak Lulus</h1>
        @endif

        <div class="mt-4">
            @if ($student->file && $student->is_graduated)
                <a href="{{ Storage::url($student->file) }}" class="btn btn-primary btn-custom" download>
                    📄 Download SKL
                </a>
            @endif

            <a href="{{ route('home') }}" class="btn btn-secondary btn-custom">Kembali</a>
        </div>
    </div>
</body>

</html>
