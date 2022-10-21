<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = [
       'order_id',
       'fname',
       'lname',
       'email',
       'number',
       'address1',
       'address2',
       'country',
       'state',
       'city',
       'zip'
    ];
}
