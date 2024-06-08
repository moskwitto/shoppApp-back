<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = 'customers';
    protected $primaryKey = 'customerID';
    protected $fillable = ['firstName', 'lastName', 'password', 'role', 'email', 'registrationDate'];

    // Relationships
    public function orders()
    {
        return $this->hasMany(Order::class, 'customerID');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'vendorID');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     *
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
