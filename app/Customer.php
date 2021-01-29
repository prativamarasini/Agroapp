<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded=[];

    public function ordertables()
    {
        return $this->hasMany(Ordertable::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
        
    }
}
