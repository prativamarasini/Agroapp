<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded=[ ];

    public function products(){
        return $this->belongsTo(Product::class);
    }

    public function customers(){
        return $this->hasMany(Customer::class);
    }

    public function orders(){
        return $this->belongsTo(Ordertable::class);
    }
}
