<?php

namespace App\Http\Controllers;

use App\Models\detailtransaksi;
use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    // Kelola User

    public function index()
    {
        $data = User::where('role','customer')->get();
        return view('adm.index',compact('data'));
    }

    public function tambah()
    {
        return view('adm.tambah');
    }

    public function posttambah(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'username'=>'required',
            'password'=>'required',
        ]);

        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'role'=>'customer'
        ]);
        return redirect()->route('adm.index')->with('status','Berhasil tambah User');
    }

    public function edit(user $user)
    {
        return view('adm.edit',compact('user'));
    }

    public function postedit(request $request, user $user)
    {
        $data = $request->validate([
            'name'=>'required',
            'username'=>'required',
            'password'=>'required',
        ]);

        $user->update($data);
        return redirect()->route('adm.index')->with('status','Berhasil edit User');
    }



    // Kelola Produk

    public function produkindex()
    {
        $kategori = kategori::all();
        $produk = produk::all();
        return view('prk.index',compact('produk','kategori'));
    }

    public function vtambahproduk(kategori $kategori)
    {
        $kategori = kategori::all();
        return view('prk.tambah',compact('kategori'));
    }
    
    public function tambahproduk(Request $request)
    {
        $request->validate([
            'kategori_id'=>'required',
            'name'=>'required',
            'harga'=>'required|numeric',
            'keterangan'=>'required',
            'foto'=>'required|file|image',
        ]);

        produk::create([
            'kategori_id'=>$request->kategori_id,
            'name'=>$request->name,
            'harga'=>$request->harga,
            'keterangan'=>$request->keterangan,
            'foto'=>$request->foto->store('images')
        ]);

        return redirect()->route('prk.index')->with('status','Berhasil tambah produk');
    }

    public function veditproduk(produk $produk)
    {
        $kategori = kategori::all();
        return view('prk.edit',compact('produk','kategori'));
    }

    public function editproduk(request $request, produk $produk)
    {
        $request->validate([
            'kategori_id'=>'required',
            'name'=>'required',
            'harga'=>'required|numeric',
            'keterangan'=>'required',
            'foto'=>'nullable|sometimes|file|image',
        ]);

        if ($request->foto) {
            if (File::exist($produk->foto)) {
                unlink($produk->foto);
                $img = $request->foto->store('images');
            } else {
                $img = $request->foto->store('images');
            }
            
        } else {
            $img = $produk->foto;
        }

        $produk->kategori_id = $request->kategori_id;
        $produk->name = $request->name;
        $produk->harga = $request->harga;
        $produk->keterangan = $request->keterangan;
        $produk->foto = $img;
        $produk->save();

        return redirect()->route('prk.index')->with('status','Berhasil edit : '.$produk->name);
        
    }


    // Kelola kategori

    public function ktgindex()
    {
        $kategori = kategori::all();
        return view('ktg.index',compact('kategori'));
    }

   public function vtambahktg()
   {
        return view('ktg.tambah');
   }

    public function tambahktg(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        kategori::create([
            'name'=>$request->name
        ]);

        return redirect()->route('ktg.index')->with('status','Berhasil tambah kategori');
    }

    public function veditktg()
    {
        return view('ktg.edit');
    }

    //kelola transaksi

    public function tv()
    {
        $data = detailtransaksi::where('status','checkout')->get();
        return view('transaksi.validasi',compact('data'));
    }

    public function vld(detailtransaksi $detailtransaksi)
    {
        $detailtransaksi->update([
            'status'=>'dikirim'
        ]);

        return back()->with('status','Berhasil diverifikasi');
    }
}
