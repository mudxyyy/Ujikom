<?php

namespace App\Http\Controllers;

use App\Models\detailtransaksi;
use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function home()
    {
        $data = produk::all();
        return view('home', compact('data'));
    }

    public function detail(Request $request, produk $produk)
    {
        return view('detail',compact('produk'));
    }

    public function ker()
    {
        $detailtransaksi = detailtransaksi::where('user_id', auth()->id())->where('status','keranjang')->with('produk')->get();
        return view('keranjang',compact('detailtransaksi'));
    }

    public function postker(Request $request, produk $produk)
    {
        $request->validate([
            'qty'=>'required'
        ]);

        detailtransaksi::create([
            'user_id'=>Auth::id(),
            'produk_id'=>$produk->id,
            'qty'=>$request->qty,
            'status'=>'keranjang',
            'totalharga'=>$produk->harga * $request->qty
        ]);
        return redirect()->route('ker')->with('status','Berhasil masuk keranjang');
    }

    public function updatekeranjang(request $request,detailtransaksi $detailtransaksi)
    {
        $request->validate([
            'qty'=>'required'
        ]);

        $detailtransaksi->update([
            'qty'=>$request->qty,
            'totalharga'=>$detailtransaksi->produk->harga * $request->qty
        ]);

        return back()->with('status','Berhasil update qty');
    }

    public function bayar(request $request, detailtransaksi $detailtransaksi)
    {
        $produk = $detailtransaksi->produk;
        return view('bayar',compact('produk','detailtransaksi'));
    }
    
    public function prosesbayar(request $request, detailtransaksi $detailtransaksi)
    {
        $request->validate([
            'bukti'=>'required'
        ]);

        $transaksi = transaksi::create([
            'user_id'=>Auth::id(),
            'totalharga'=>$detailtransaksi->totalharga,
            'kode'=>'INV'.Str::random(8),
            'bukti'=>$request->bukti->store('images')
        ]);

        $detailtransaksi->update([
            'transaksi_id'=>$transaksi->id,
            'status'=>'checkout',
        ]);
        return redirect()->route('sum')->with('status','Berhasil checkout');
    }

    public function sum()
    {
        $detailtransaksi = detailtransaksi::where('user_id', auth()->id())->where('status','!=','keranjang')->with('produk')->get();
        return view('summary',compact('detailtransaksi'));
    }
}
