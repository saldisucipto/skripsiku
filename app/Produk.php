<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // Dekare Table
    protected $table = 'produk';

    // Deklare Guarded
    protected $guarded = [];

    // Deklare Primary Key
    protected $primaryKey = 'id_produk';

    // Deklare relations
    public function kategori()
    {
        return $this->belongsTo('App\KatProduk', 'id_kategori');
    }

    // Derkare relation with order produk
    public function orderKeranjang()
    {
        return $this->belongsTo('App\TransaksiOrder', 'id_produk', 'id_produk');
    }
}
