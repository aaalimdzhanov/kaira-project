<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('total_amount', 15, 2)->nullable();
            $table->string('phone')->nullable();
            $table->string('status')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }
}
