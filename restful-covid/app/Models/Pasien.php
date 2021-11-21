<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pasien extends Model
{
    use HasFactory;

    //membuat properti fillable yang digunakan untuk menambah data pada method post
    protected $fillable = ['name', 'phone', 'address', 'status', 'in_date_at', 'out_date_at'];
}