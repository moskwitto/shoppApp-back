<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // protected $table = 'orders';
    protected $table = 'Orders';
    protected $primaryKey = 'orderID';
    protected $fillable = ['productID', 'customerID', 'destination', 'deliveryStatus', 'paymentStatus', 'orderAmount', 'orderDate'];

    // Relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }
}
