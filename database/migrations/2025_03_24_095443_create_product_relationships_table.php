<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRelationshipsTable extends Migration
{
    public function up()
    {
        Schema::create('product_relationships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('child_id');
        
            $table->foreign('parent_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');
        
            $table->foreign('child_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');
        
            $table->unique(['parent_id', 'child_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_relationships');
    }
}