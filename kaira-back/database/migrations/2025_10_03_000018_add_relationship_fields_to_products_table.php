<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('material_id')->nullable();
            $table->foreign('material_id', 'material_fk_10732324')->references('id')->on('materials');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id', 'brand_fk_10732325')->references('id')->on('brands');
            $table->unsignedBigInteger('season_id')->nullable();
            $table->foreign('season_id', 'season_fk_10732326')->references('id')->on('seasons');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id', 'country_fk_10732327')->references('id')->on('countries');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_10732564')->references('id')->on('categories');
        });
    }
}
