<?php

namespace App\Models;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'cat_id',
        // 'subcat_id',
        'name',
        'slug',
        'small_description',
        'description',
        'regular_price',
        'seller_price',
        'product_quantity',
        'cover',
        'hover',
        'images',
        'status'
    ];
    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }
    // public function subCategory(){
    //     return $this->belongsTo(SubCategory::class,'subcat_id');
    // }
    // public function images(){
    //     return $this->hasMany(Gallery::class,'cat_id');
    // }

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function orderItem(){
        return $this->belongsTo(OrderItem::class);
    }

    public function rating(){
        return $this->hasMany(Rating::class,'product_id');
    }

}
