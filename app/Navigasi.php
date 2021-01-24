<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigasi extends Model
{
    // deklare table
    protected $table = 'navigasi';

    // protected guarded row
    protected $guarded = [];

    // deklare realtions
    public function parent(){
        return $this->belongsTo('App\ParentNavigasi', 'id_parent');
    }
}
