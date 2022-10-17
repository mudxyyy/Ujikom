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
    <div class="container">
        @if (Session::has('status'))
            <div class="alert alert-secondary mt-4"><span>{{ Session::get('status') }}</span></div>
        @endif
    </div>
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama pembeli</th>
                    <th>Gambar</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total harga</th>
                    <th>Bukti transaksi</th>
                    <th>Kode</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            @foreach ($data as $item)
                <tbody>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>
                        <img src="{{ asset($item->produk->foto) }}" alt="" width="100" height="100">
                    </td>
                    <td>{{ $item->produk->name }}</td>
                    <td>Rp. {{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->totalharga }}</td>
                    <td>
                        <img src="{{ asset($item->transaksi->bukti) }}" width="100" height="100" alt="">
                    </td>
                    <td>{{ $item->transaksi->kode }}</td>
                    <td>
                        <form action="{{ route('vld', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="form-control btn btn-success">Verifikasi</button>
                        </form>
                    </td>
                </tbody>
            @endforeach
        </table>
    </div>

</body>

</html>
