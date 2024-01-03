<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'shop_id','product_details'];

    public function shop() {
        return $this->belongsTo(Shop::class);
    }
      
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
    public function getProductDetailsAttribute()
    {
        return json_decode($this->attributes['product_details'], true);
    }
}
