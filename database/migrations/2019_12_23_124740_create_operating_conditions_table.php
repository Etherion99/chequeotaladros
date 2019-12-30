<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatingConditionsTable extends Migration
{
    public function up()
    {
        Schema::create('operating_conditions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['n', 'p1', 'p2', 'p3']);
            $table->tinyInteger('value');
            $table->bigInteger('record_id')->unsigned();
            $table->timestamps();

            $table->foreign('record_id')->references('id')->on('review_item_records')->onDelete('cascade');
        });
    }

    public function down(){
        Schema::dropIfExists('operating_conditions');
    }
}
