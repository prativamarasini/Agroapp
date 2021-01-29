<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordertable extends Model
{
    protected $guarded=[];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
