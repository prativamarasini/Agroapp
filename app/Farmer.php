<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $fillable=[
    'farmer_id',
    'full_name',	
    'gender',
    'age',	
    'email',
    'phone',
    
    'address',	
    'province',	
    'photo',	
    'citizenship_no',		
    ];
}
