<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Autentikasi;
use Illuminate\Database\Eloquent\Model;

class Member extends Autentikasi
{
    use HasFactory;

    protected $guard = 'member';

    protected $table = 'member';
    protected $guarded = ['id'];
}
