<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiOrder extends Model
{
    // deklare table
    protected $table = 'transaksi_orders';

    // deklare primary
    protected $primaryKey = 'id_trksi_order';
}
