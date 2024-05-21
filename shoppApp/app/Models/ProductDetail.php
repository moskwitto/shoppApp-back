<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProductDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'homeImage',
        'image1',
        'image2',
        'image3',
        'image4',
        'productName',
        'productDescription',
        'price',
        'stockAmount'
    ];
    
}
