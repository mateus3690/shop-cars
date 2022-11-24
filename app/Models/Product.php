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
        'published',
        'image',
        'color',
        'year_product',
        'type_model_id',
        'category_id',
        'user_id',
    ];

    protected $with = ['category', 'typeModel'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function typeModel(){
        return $this->belongsTo(TypeModel::class);
    }

}

