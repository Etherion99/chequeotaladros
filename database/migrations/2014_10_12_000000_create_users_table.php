<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('doc', 12);
            $table->string('name', 48);
            $table->string('email', 68)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamps();

            $table->primary('doc');
            DB::statement('ALTER TABLE users ADD FULLTEXT fulltext_name (name)');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
