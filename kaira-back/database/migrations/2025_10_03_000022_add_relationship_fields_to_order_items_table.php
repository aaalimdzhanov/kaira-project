<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_10733821')->references('id')->on('product_values');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id', 'order_fk_10734377')->references('id')->on('orders');
        });
    }
}
