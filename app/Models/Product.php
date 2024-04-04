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
        'new',
        'price',
        'promotion_price',
        'quantity',
        'number_of_part',
        'image',
        'description',
        'brand_id',
        'product_type_id',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function product_type()
    {
        return $this->belongsTo(ProductType::class);
    }
    protected $casts = [
        'is_active' => 'boolean'
    ];


}
