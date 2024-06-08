<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $table = 'products';
    protected $table = 'Product';
    protected $primaryKey = 'productID';
    protected $fillable = ['productName', 'categoryID', 'price', 'stockAmount', 'vendorID', 'productDescription', 'imageUrl'];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryBroader');
    }

    public function vendor()
    {
        return $this->belongsTo(Customer::class, 'vendorID');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'productID');
    }
}
