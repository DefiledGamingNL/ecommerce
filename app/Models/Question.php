<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'question',
        'answer',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getQuestionAttribute($value)
    {
        return ucfirst($value);
    }

    public function getAnswerAttribute($value)
    {
        return ucfirst($value);
    }

    public function setQuestionAttribute($value)
    {
        $this->attributes['question'] = ucfirst($value);
    }

    public function setAnswerAttribute($value)
    {
        $this->attributes['answer'] = ucfirst($value);
    }



}
