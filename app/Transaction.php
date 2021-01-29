<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable=[
        'transaction_id',
        'transaction_date',
        'amount_of_transaction',
        'bank_name'
    ];
}
