<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'orderID',
        'productID',
        'customerID',
        'destination',
        'deliveryStatus',
        'paymentStatus',
        'orderAmount',
        'orderDate',
    ];
}
