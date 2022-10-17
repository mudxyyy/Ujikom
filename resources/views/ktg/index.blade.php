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
        <a href="{{ route('ktg.tambah') }}" id="" class="btn btn-primary">Tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            @foreach ($kategori as $item)
                <tbody>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="{{ route('dltktg', $item->id) }}" class="btn btn-danger"
                            onclick="return confirm('Apakah yakin akan dihapus?')">Hapus</a>
                    </td>
                </tbody>
            @endforeach
        </table>
    </div>

</body>

</html>
