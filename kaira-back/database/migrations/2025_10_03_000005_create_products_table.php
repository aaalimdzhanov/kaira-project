<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ru');
            $table->string('name_uz');
            $table->string('description_ru');
            $table->string('description_uz');
            $table->string('status')->default(\App\Enums\ProductStatus::PENDING->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
