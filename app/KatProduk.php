<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KatProduk extends Model
{
    // deklare table
    protected $table = 'kat_produk';

    // guarded
    protected $guarded = [];

    // dklare primary key
    protected $primaryKey = 'id_kategori';
}
