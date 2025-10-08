<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration
{
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_ru');
            $table->string('title_uz');
            $table->string('key');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
