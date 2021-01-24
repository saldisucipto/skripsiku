<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentNavigasi extends Model
{
    // deklare table
    protected $table = 'parent_navigasi';

    // guarded table
    protected $guarded = [];

    // Relationship one to many
    public function navigasi(){
        return $this->hasMany('App\Navigasi', 'id');
    }
}
