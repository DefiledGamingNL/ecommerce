<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'status',
        'image',
        'category_id',
        'user_id',
        'published_at',
        'is_published',
        'is_featured',
        'is_discounted',
        'discount_price',
        'discount_percent',
        'view_count',
        'order_count',
        'rating_count',
        'rating_value',
        'review_count',
        'wish_count',
        'cart_count',
        'compare_count',
        'question_count',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function wishlists()
    {
        return $this->belongsToMany(User::class, 'wishlists');
    }

    public function carts()
    {
        return $this->belongsToMany(User::class, 'carts');
    }

    public function compares()
    {
        return $this->belongsToMany(User::class, 'compares');
    }

    public function orders()
    {
        return $this->belongsToMany(User::class, 'orders')->withPivot('quantity', 'price', 'discount_price', 'discount_percent', 'status');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function getRatingValueAttribute()
    {
        return $this->ratings->avg('value');
    }

    public function getRatingCountAttribute()
    {
        return $this->ratings->count();
    }

    public function getReviewCountAttribute()
    {
        return $this->reviews->count();
    }

    public function getWishCountAttribute()
    {
        return $this->wishlists->count();
    }

    public function getCartCountAttribute()
    {
        return $this->carts->count();
    }

    public function getCompareCountAttribute()
    {
        return $this->compares->count();
    }




}
