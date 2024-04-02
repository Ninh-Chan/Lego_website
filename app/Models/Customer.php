<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'password',
        'address'
    ];
    public $timestamps = false;
}
