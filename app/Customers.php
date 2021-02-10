<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customers extends Authenticatable
{
    // use notifiable
    use Notifiable;
    // deklare table
    // protected $table = 'customers';

    protected $guard = 'customer';

    protected $primaryKey = 'id_customers';
    // deklare guarded table
    protected $guarded = [];

    // table
    protected $table="customers";


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
