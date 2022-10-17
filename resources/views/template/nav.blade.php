<div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="{{ route('home') }}" class="navbar-brand">SMKN 2 Sukabumi</a>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                @guest
                    <a href="{{ route('home') }}"
                        class="nav-link {{ Request::is('/') ? 'text-white' : 'text-secondary' }}">Home</a>
                    <a href="{{ route('login') }}"
                        class="nav-link {{ Request::is('login') ? 'text-white' : 'text-secondary' }}">Login</a>
                @endguest
                @auth
                    @if (auth()->user()->role == 'admin')
                        <a href="{{ route('adm.index') }}"
                            class="nav-link {{ Request::is('index') ? 'text-white' : 'text-secondary' }} ">Kelola User</a>
                        <a href="{{ route('prk.index') }}"
                            class="nav-link {{ Request::is('produkindex') ? 'text-white' : 'text-secondary' }}">Kelola
                            Produk</a>
                        <a href="{{ route('ktg.index') }}"
                            class="nav-link {{ Request::is('ktgindex') ? 'text-white' : 'text-secondary' }}">Kelola
                            Kategori</a>
                        <a href="{{ route('transaksi.validasi') }}"
                            class="nav-link {{ Request::is('tv') ? 'text-white' : 'text-secondary' }}">Kelola
                            Transaksi</a>
                        <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                    @else
                        <a href="{{ route('ker') }}"
                            class="nav-link {{ Request::is('ker') ? 'text-white' : 'text-secondary' }}">Keranjang</a>
                        <a href="{{ route('sum') }}"
                            class="nav-link {{ Request::is('sum') ? 'text-white' : 'text-secondary' }}">Summary</a>
                        <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
