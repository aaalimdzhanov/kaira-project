<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductValuesTable extends Migration
{
    public function up()
    {
        Schema::table('product_values', function (Blueprint $table) {
            $table->unsignedBigInteger('product_ids_id')->nullable();
            $table->foreign('product_ids_id', 'product_ids_fk_10719442')->references('id')->on('products');
            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id', 'color_fk_10719450')->references('id')->on('colors');
            $table->unsignedBigInteger('size_id')->nullable();
            $table->foreign('size_id', 'size_fk_10719451')->references('id')->on('sizes');
        });
    }
}
