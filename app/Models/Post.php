<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id',
        'slug',
        'meta_description',
        'meta_keywords',
        'image',
    ];

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
