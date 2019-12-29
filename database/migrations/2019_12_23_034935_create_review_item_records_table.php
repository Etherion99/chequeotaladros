<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewItemRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('review_item_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('review_id')->unsigned();
            $table->smallInteger('item_id')->unsigned();
            $table->String('comment', 250)->default("");
            $table->timestamps();

            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('review_items')->onDelete('cascade');
        });
    }

    public function down(){
        Schema::dropIfExists('review_item_records');
    }
}
