<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('review_categories', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name', 40);
        });
    }

    public function down()
    {
        Schema::dropIfExists('review_categories');
    }
}
