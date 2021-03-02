<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    // deklare table
    protected $table = 'metode_pembayaran';

    // primary key
    protected $primaryKey = 'id_metode';

    // deklare guarded table
    protected $guarded = [];

    // relations
    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'id_invoice');
    }
}
