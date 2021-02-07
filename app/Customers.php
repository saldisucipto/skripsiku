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

    protected $primayKey = 'id_customers';
    // deklare guarded table
    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setPasswordAttribute($password)
    {
        if (\Hash::needsRehash($password)) {
            $password = \Hash::make($password);
        }
        $this->attributes['password'] = $password;
    }
}
