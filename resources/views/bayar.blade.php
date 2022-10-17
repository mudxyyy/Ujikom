<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist\css\bootstrap.min.css') }}">

    <title>Selamat Datang</title>
</head>

<body>

    @include('template.nav')
    <div class="container mt-5">
        <h5>UPLOAD BUKTI PEMBAYARAN</h5>
        <hr>
        <form action="{{ route('prosesbayar', $detailtransaksi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="card" style="width: 20rem">
                        <img src="{{ asset($produk->foto) }}" alt="" class="card-img-top">
                    </div>
                </div>

                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produk->name }}</h5>
                            <hr>
                            <p class="card-text">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</p>
                            <p class="card-text">Jumlah : {{ $detailtransaksi->qty }}</p>
                            <p class="card-text">Total Rp.
                                {{ number_format($detailtransaksi->totalharga, 0, ',', '.') }}
                            </p>
                            <hr>
                            <div class="mb-2">
                                <label for="" class="form-control"><b>BUKTI PEMBAYARAN</b></label>
                                <br>
                                <input class="btn btn-outline-secondary" type="file" name="bukti" accept="image/*"
                                    required>
                            </div>
                            <hr>
                            <h5>Keterangan : </h5>
                            <p>bayar hela</p>
                            <button class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
