<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Store extends Model
{
    /** @use HasFactory<\Database\Factories\StoreFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone'
    ];

    public function stocks() : HasMany {
        return $this->hasMany(Stock::class);
    }

    public function products() : HasManyThrough {
        return $this->hasManyThrough(Product::class, Stock::class);
    }
}
