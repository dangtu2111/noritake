<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone', 20);
            $table->integer('ward_id');
            $table->integer('district_id');
            $table->integer('province_id');
            $table->longText('cart');
            $table->string('address');
            $table->string('note')->nullable();
            $table->double('total_amount');
            $table->integer('total_items')->default(1);
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['pending', 'confirmed', 'shipping', 'canceled', 'completed'])->default('pending');
            $table->enum('payment', ['unpaid', 'paid', 'failed'])->default('unpaid');
            $table->string('payment_method', 50);
            $table->timestamp('paid_at')->nullable(); // Thêm cột `paid_at`
            $table->timestamps(); // Tạo `created_at` và `updated_at`
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};