<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist\css\bootstrap.min.css') }}">

    <title>Detail</title>
</head>

<body>

    @include('template.nav')

    <div class="container mt-5">
        <form action="{{ route('postker', $produk->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <img src="{{ asset($produk->foto) }}" alt="" class="card-img-top p-3">
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produk->name }}</h5>
                            <p class="card-text">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</p>
                            <input type="number" name="qty" class="form-control">
                            <hr>
                            <h5>Keterangan :</h5>
                            <p>{{ $produk->keterangan }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $produk->kategori->name }}</h5>
                            <hr>
                            <button type="submit" class="btn btn-success d-block mt-3 form-control">Beli</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
