<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AromaParfum extends Model
{
    use HasFactory;
    protected $table = 'aroma_parfum';
    protected $guarded = ['id'];

}
