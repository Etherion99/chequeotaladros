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
            $table->smallInteger('item')->unsigned();
            $table->String('comment', 250);
            $table->timestamps();

            $table->foreign('item')->references('id')->on('review_items')->onDelete('cascade');
        });
    }

    public function down(){
        Schema::dropIfExists('review_item_records');
    }
}
