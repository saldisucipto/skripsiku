<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    // deklare table
    protected $table = 'invoice';

    // dekalre primary key
    protected $primaryKey = 'id_invoice';

    //
    protected $guarded = [];
    public $timestamps = false;

    public function pembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class, 'id_metode_pembayaran');
    }

    // order
    public function order()
    {
        return $this->hasMany(Order::class, 'id_invoice');
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'id_customer');
    }
}
