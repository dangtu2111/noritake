<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInfoColumnToTextInProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Chuyển cột info sang kiểu TEXT
            $table->text('info')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Hoàn tác về VARCHAR(255) nếu cần
            $table->string('info', 255)->nullable()->change();
        });
    }
}