<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'number_of_part',
        'image',
        'description',
        'brand_id',
        'product_type_id',
    ];

    public $timestamps = false;

}
