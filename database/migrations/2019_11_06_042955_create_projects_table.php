<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('creator', 12);
            $table->timestamps();

            $table->foreign('creator')->references('doc')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
