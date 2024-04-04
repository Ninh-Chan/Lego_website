<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $table = 'brands';

    protected $fillable = [
        'name',
        'image',
    ];
    public $timestamps = false;
}
