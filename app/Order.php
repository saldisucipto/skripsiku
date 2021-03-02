<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // deklare table
    protected $table = 'orders';

    // primary key
    protected $primaryKey = 'id_order';

    // deklare with pengiriman relation
    public function pengiriman()
    {
        return $this->belongsTo('App\MetodePengiriman', 'id_pengiriman');
    }

    // deklare with customer
    public function customer()
    {
        return $this->belongsTo(Customers::class, 'id_customer');
    }

    // dekalre with trksi
    public function transaksi()
    {
        return $this->hasMany(TransaksiOrder::class, 'id_order');
    }

    // deklare
    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'id_invoice');
    }
}
