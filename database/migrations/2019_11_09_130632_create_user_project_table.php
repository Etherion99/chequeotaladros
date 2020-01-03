<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProjectTable extends Migration
{
    public function up()
    {
        Schema::create('user_project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('project_id')->unsigned();
            $table->string('user_doc');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('user_doc')->references('doc')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_user');
    }
}
