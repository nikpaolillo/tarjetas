<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('usuario',100)->unique();
            $table->string('password')->default('$2y$10$JU2P.IhJpKImsiYLpBTXQ.wCGqa9.9sVbkx84jR/hQpW9VkCkynNm');
            $table->boolean('requiere_cambio')->default(1);
            $table->boolean('bloqueado')->default(0);
            $table->boolean('super_admin')->default(0);
            $table->dateTime('last_login')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
