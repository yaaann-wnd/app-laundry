<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pembayaran');
            $table->foreignId('id_member')->constrained('member')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_user_kasir')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_user_kurir')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_jasa')->constrained('produk_jasa')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_transaksi')->nullable();
            $table->string('no_telp_transaksi')->nullable();
            $table->string('alamat_transaksi')->nullable();
            $table->text('longitude')->nullable();
            $table->text('latitude')->nullable();
            $table->integer('kg_order')->nullable();
            $table->integer('harga_perkg')->nullable();
            $table->integer('total_harga')->nullable();
            $table->string('metode_pembayaran');
            $table->integer('pembayaran')->nullable();
            $table->string('status_transaksi')->nullable();
            $table->string('status_pembayaran')->nullable();
            $table->string('status_kurir')->nullable();
            $table->string('id_promo')->nullable();
            $table->text('id_parfum')->nullable();
            $table->text('order_user')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
