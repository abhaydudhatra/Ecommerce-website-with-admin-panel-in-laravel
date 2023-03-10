<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'category_id',
        'title',
        'desc',
        'sku',
        'regular_price',
        'sale_price',
        'img',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
