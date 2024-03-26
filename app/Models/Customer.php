<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    use Authenticatable;
    public $timestamps = false;
    protected $primaryKey = "id";

    protected $table = 'customers';

    protected $fillable= [
        'customer_name',
        'customer_phone_number',
        'customer_email',
        'customer_password',
        'customer_address',
        'status',
    ];
}
