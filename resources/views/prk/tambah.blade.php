<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.0.2-dist\css\bootstrap.min.css">

    <title>Tambah User</title>
</head>

<body>

    @include('template.nav')

    <div class="container mt-5">
        <form action="{{ route('tambahproduk') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nama Produk</label>
                <input type="text" name="name" autofocus required class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Harga</label>
                <input type="text" name="harga" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">keterangan</label>
                <input type="text" name="keterangan" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Foto</label>
                <br>
                <input type="file" name="foto" accept="image/*" class="btn btn-outline-secondary" required>
            </div>
            <div class="mb-3">
                <select name="kategori_id" class="form-select" id="">
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Tambah</button>
        </form>
    </div>

</body>

</html>
