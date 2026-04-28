<!DOCTYPE html>
<html>
<head>
    <title>JastipGo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h1 class="text-center mb-4">🛍️ JastipGo</h1>

    <!-- FORM -->
    <div class="card p-4 mb-4 shadow">
        <form action="/add" method="POST">
            @csrf
            <input class="form-control mb-2" type="text" name="nama_barang" placeholder="Nama Barang" required>
            <input class="form-control mb-2" type="text" name="deskripsi" placeholder="Deskripsi" required>
            <input class="form-control mb-2" type="text" name="pemesan" placeholder="Nama Pemesan" required>
            <button class="btn btn-primary w-100">Tambah Jastip</button>
        </form>
    </div>

    <!-- LIST DATA -->
    @foreach($orders as $o)
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <h5>{{ $o->nama_barang }}</h5>
            <p>{{ $o->deskripsi }}</p>
            <p>Status: 
                <span class="badge bg-secondary">{{ $o->status }}</span>
            </p>

            @if($o->status == 'open')
                <a href="/take/{{ $o->id }}" class="btn btn-warning btn-sm">Ambil</a>
            @elseif($o->status == 'taken')
                <a href="/done/{{ $o->id }}" class="btn btn-success btn-sm">Selesai</a>
            @endif
        </div>
    </div>
    @endforeach

</div>

</body>
</html>