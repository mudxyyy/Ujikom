<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailtransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailtransaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('transaksi_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('qty');
            $table->integer('totalharga');
            $table->enum('status', ['keranjang','checkout','dikirim']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailtransaksis');
    }
}
