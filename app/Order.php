<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // deklare table
    protected $table = 'orders';

    // primary key
    protected $primaryKey = 'id_order';
}
