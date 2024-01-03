<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'description', 'price','image'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function shops() {
        return $this->belongsToMany(Shop::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function carts()
{
    return $this->hasMany(Cart::class);

}

}