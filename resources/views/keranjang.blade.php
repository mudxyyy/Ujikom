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
        <h5>KERANJANG</h5>
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
                            <p class="card-text">Rp. {{ number_format($item->produk->harga, 0, ',', '.') }}</p>
                            <form action="{{ route('updatekeranjang', $item->id) }}" method="POST">
                                @csrf
                                <input type="number" name="qty" class="form-control" value="{{ $item->qty }}">
                                <i style="color: blue">Enter untuk tambah qty</i>
                            </form>
                            <hr>
                            <p class="card-text">Total Rp. {{ number_format($item->totalharga, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <div class="col-2 p-4">
                        <div class="card-body">
                            <a href="{{ route('bayar', $item->id) }}" class="btn btn-success d-block mt-3">Bayar</a>
                            <a href="{{ route('dltker', $item->id) }}" class="btn btn-danger d-block mt-3">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</body>

</html>
