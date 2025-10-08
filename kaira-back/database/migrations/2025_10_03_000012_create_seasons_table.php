<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasonsTable extends Migration
{
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_ru');
            $table->string('title_uz');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
