<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "id";

    protected $table = 'admins';
    protected $fillable = [
        'admin_name',
        'admin_phone_number',
        'admin_email',
        'admin_password',
        'is_active'
    ];

    protected $hidden = [
        'admin_password', // Ẩn mật khẩu admin khi trả về dữ liệu
    ];
}
