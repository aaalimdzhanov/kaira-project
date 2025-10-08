<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductValuesTable extends Migration
{
    public function up()
    {
        Schema::create('product_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('price', 15, 2);
            $table->decimal('initial_price', 15, 2);
            $table->decimal('old_price', 15, 2)->nullable();
            $table->integer('discount')->nullable();
            $table->datetime('discount_start')->nullable();
            $table->datetime('discount_end')->nullable();
            $table->integer('stock');
            $table->string('code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
