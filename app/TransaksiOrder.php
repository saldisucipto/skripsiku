<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiOrder extends Model
{
    // deklare table
    protected $table = 'transaksi_orders';

    // deklare primary
    protected $primaryKey = 'id_trksi_order';

    // deklare produk relations
    public function produk()
    {
        return $this->hasMany('App\Produk', 'id_produk', 'id_produk');
    }
}
