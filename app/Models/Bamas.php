<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bamas extends Model
{
    use HasFactory;

    protected $table = 'tbl_barang';

    protected $fillable = [
        'nama_barang',
        'type',
        'serial_no',
        'no_produk',
        'no_kontrak',
        'good_in',
        'return_in',
        'text'
    ];
}
