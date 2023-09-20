<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $guarded = ['id'];

    public function produk_jasa() {
        return $this->belongsTo(ProdukJasa::class);
    }
    public function member() {
        return $this->belongsTo(Member::class);
    }
}
