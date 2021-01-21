<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    // deklare table
    protected $table = 'company_info';

    // guarded table
    protected $guarded = [];
}
