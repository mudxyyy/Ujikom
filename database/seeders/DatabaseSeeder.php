<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\produk;
use App\Models\kategori;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name'=>'admin',
            'username'=>'admin',
            'password'=>bcrypt('admin'),
            'role'=>'admin'
        ]);

        kategori::create([
            'name'=>'makanan'
        ]);

        kategori::create([
            'name'=>'minuman'
        ]);

        produk::create([
            'kategori_id'=>'1',
            'name'=>'Lays',
            'harga'=>5000,
            'foto'=>'img/lays.jpg',
            'keterangan'=>'rasa rumput laut'
        ]);
        produk::create([
            'kategori_id'=>'2',
            'name'=>'Teh Kotak',
            'harga'=>6000,
            'foto'=>'img/teh.jpg',
            'keterangan'=>'manis kaya kamu'
        ]);
        produk::create([
            'kategori_id'=>'1',
            'name'=>'chitato',
            'harga'=>5000,
            'foto'=>'img/chitato.jpg',
            'keterangan'=>'rasa BBQ'
        ]);
        produk::create([
            'kategori_id'=>'2',
            'name'=>'Pocari Sweat',
            'harga'=>8000,
            'foto'=>'img/pocari.jpg',
            'keterangan'=>'menghilangkan dehidrasi'
        ]);
        produk::create([
            'kategori_id'=>'1',
            'name'=>'Kris Bee',
            'harga'=>3000,
            'foto'=>'img/kris.jpg',
            'keterangan'=>'Cruncy'
        ]);
        produk::create([
            'kategori_id'=>'2',
            'name'=>'Ultramilk',
            'harga'=>4000,
            'foto'=>'img/ultra.jpg',
            'keterangan'=>'Sehat'
        ]);
        produk::create([
            'kategori_id'=>'2',
            'name'=>'Ultramilk',
            'harga'=>4000,
            'foto'=>'img/ultra.jpg',
            'keterangan'=>'Sehat'
        ]);
        produk::create([
            'kategori_id'=>'1',
            'name'=>'Kris Bee',
            'harga'=>3000,
            'foto'=>'img/kris.jpg',
            'keterangan'=>'Cruncy'
        ]);
        produk::create([
            'kategori_id'=>'2',
            'name'=>'Pocari Sweat',
            'harga'=>8000,
            'foto'=>'img/pocari.jpg',
            'keterangan'=>'menghilangkan dehidrasi'
        ]);
        produk::create([
            'kategori_id'=>'1',
            'name'=>'chitato',
            'harga'=>5000,
            'foto'=>'img/chitato.jpg',
            'keterangan'=>'rasa BBQ'
        ]);
        produk::create([
            'kategori_id'=>'2',
            'name'=>'Teh Kotak',
            'harga'=>6000,
            'foto'=>'img/teh.jpg',
            'keterangan'=>'manis kaya kamu'
        ]);
        produk::create([
            'kategori_id'=>'1',
            'name'=>'Lays',
            'harga'=>5000,
            'foto'=>'img/lays.jpg',
            'keterangan'=>'rasa rumput laut'
        ]);
    }
}
