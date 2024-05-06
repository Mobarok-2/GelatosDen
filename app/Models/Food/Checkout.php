<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkouts';

    protected $fillable = [
        'name',
        'email',
        'town',
        'country',
        'zipcode',
        'phone_number',
        'address',
        'user_id',
        'price',
        'status',
    ];

}
