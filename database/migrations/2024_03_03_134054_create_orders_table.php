<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_buy');
            $table->string('status');
            $table->unsignedBigInteger('customer_id');
            $table->string('customer_password');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('shipping_method_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->text('receiver_address');
            $table->timestamps(false);

            // Foreign keys
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
