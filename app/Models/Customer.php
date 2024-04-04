<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;
    public $timestamps = false;
    protected $primaryKey = "id";

    protected $table = 'customers';

    protected $fillable= [
        'name',
        'phone_number',
        'email',
        'password',
        'address',
    ];
}
