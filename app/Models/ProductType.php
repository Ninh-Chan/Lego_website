<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $table = 'product_types';
    protected $fillable = [
         'name',
    ];
    public $timestamps = false;
}
