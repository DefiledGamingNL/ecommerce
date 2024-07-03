<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRatingAttribute($value)
    {
        return $value / 2;
    }

    public function setRatingAttribute($value)
    {
        $this->attributes['rating'] = $value * 2;
    }

    public function getRatingStarsAttribute()
    {
        return str_repeat('⭐', $this->rating);
    }

    public function getRatingPercentAttribute()
    {
        return $this->rating * 10;
    }


}
