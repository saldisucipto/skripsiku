<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiPengiriman extends Model
{
    // protected primary key
    protected $table = 'transaksi_pengiriman';

    //
    protected $primaryKey = 'id_pengiriman';
}
