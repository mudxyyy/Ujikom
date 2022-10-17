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
        <h5>SUMMARY</h5>
        <div class="container">
            @if (Session::has('status'))
                <div class="alert alert-secondary mt-4"><span>{{ Session::get('status') }}</span></div>
            @endif
        </div>
        <hr>
        @foreach ($detailtransaksi as $item)
            <div class="card mt-3">
                <div class="row">
                    <div class="col-2 p-4">
                        <div class="card">
                            <img src="{{ asset($item->produk->foto) }}" alt="" class="img-thumbnail">
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->produk->name }}</h5>
                            <hr>
                            <p class="card-text">Rp. {{ number_format($item->produk->harga, 0, ',', '.') }}</p>
                            <p class="card-text">Jumlah : {{ $item->qty }}</p>
                            <p class="card-text">Total Rp. {{ number_format($item->totalharga, 0, ',', '.') }}</p>
                            <h3 class="card-title">{{ $item->transaksi->kode }}</h3>
                            <hr>
                            <i class="card-text">status : {{ $item->status }}</i>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</body>

</html>
