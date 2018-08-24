<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operadoras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100)->unique();
            $table->string('logo');
            $table->string('css');
            $table->string('css_mobile');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('perfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100)->unique();
            $table->boolean('permite_login');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('operadora_perfil_usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usuario_id');
            $table->unsignedInteger('operadora_id');
            $table->unsignedInteger('perfil_id');
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('operadora_id')->references('id')->on('operadoras');
            $table->foreign('perfil_id')->references('id')->on('perfiles');
            $table->softDeletes();
  
        });
/*
        Schema::table('operadora_perfil_usuario', function (Blueprint $table) {
        });
*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operadora_perfil_usuario');
        Schema::dropIfExists('perfiles');
        Schema::dropIfExists('operadoras');
    }
}
