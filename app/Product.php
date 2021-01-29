<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ordertable(){
        return $this->hasMany(Ordertable::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
