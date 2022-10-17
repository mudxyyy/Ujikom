<div class="container">
    <div class="row">
        @foreach ($data as $item)
            <div class="col-2 mt-3">
                <div class="card border-success" style="width: 10rem">
                    <img src="{{ asset($item->foto) }}" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                        <a href="{{ route('detail', $item->id) }}" class="btn btn-success d-block">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
