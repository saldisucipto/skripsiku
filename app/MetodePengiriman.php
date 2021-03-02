<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetodePengiriman extends Model
{
    // Table Deklare
    protected $table = 'metode_pengiriman';

    // primaryKey
    protected $primaryKey = 'id_metode_pengiriman';

    // deklare with order
    public function order()
    {
        return $this->hasMany('App/Customer', 'id_customer');
    }
}
