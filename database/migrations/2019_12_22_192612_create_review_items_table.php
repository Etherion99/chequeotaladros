<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewItemsTable extends Migration
{
    public function up()
    {
        Schema::create('review_items', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 308);
            $table->tinyInteger('category')->unsigned();

            $table->foreign('category')->references('id')->on('review_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('review_items');
    }
}
