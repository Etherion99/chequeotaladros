<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewItemPhotosTable extends Migration
{
    public function up()
    {
        Schema::create('review_item_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('extension', 3);
            $table->bigInteger('review_item_record')->unsigned();
            $table->timestamps();

          $table->foreign('review_item_record')->references('id')->on('review_item_records')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('review_item_photos');
    }
}
