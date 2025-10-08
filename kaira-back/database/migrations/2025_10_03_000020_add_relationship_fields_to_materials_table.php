<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMaterialsTable extends Migration
{
    public function up()
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->unsignedBigInteger('category_ids_id')->nullable();
            $table->foreign('category_ids_id', 'category_ids_fk_10719416')->references('id')->on('categories');
        });
    }
}
