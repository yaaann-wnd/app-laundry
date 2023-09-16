<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukJasa extends Model
{
    use HasFactory;
    
    protected $table = 'produk_jasa';
    protected $guarded = ['id'];
}
