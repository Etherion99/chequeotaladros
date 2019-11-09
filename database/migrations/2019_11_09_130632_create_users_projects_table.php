<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('users_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('project_id')->unsigned();
            $table->string('user_doc');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('user_doc')->references('doc')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_projects');
    }
}
