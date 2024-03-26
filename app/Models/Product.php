<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "products";
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'number_of_part',
        'image',
        'description',
        'category_id',
        'product_type_id',
        'is_active'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product_type()
    {
        return $this->belongsTo(Type::class);
    }
    protected $casts = [
        'is_active' => 'boolean'
    ];


}
