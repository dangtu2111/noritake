<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('home_components', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('type'); // Loại component: banner, product-category, ...
            $table->json('props')->nullable(); // Thuộc tính: title, id_category, ...
            $table->integer('order')->default(0); // Thứ tự hiển thị
            $table->boolean('active')->default(true); // Trạng thái bật/tắt
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_components');
    }
};
