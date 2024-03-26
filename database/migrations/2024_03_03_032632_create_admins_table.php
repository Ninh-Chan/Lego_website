<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('admin_name');
            $table->string('admin_phone_number');
            $table->string('admin_email')->unique();
            $table->string('admin_password');
            $table->boolean('is_active')->default(1);
            $table->timestamps(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
