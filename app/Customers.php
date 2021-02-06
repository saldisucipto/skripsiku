<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    // deklare table
    protected $table = 'customers';

    // deklare guarded table
    protected $guarded = [];
}
