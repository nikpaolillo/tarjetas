<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTarjetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('estados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100)->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tarjetas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100);
            $table->unsignedInteger('modelo_tarjeta_id');
            $table->unsignedInteger('operadora_id');
            $table->unsignedInteger('equipo_id');
            $table->unsignedInteger('usuario_id');
            $table->unsignedInteger('estado_id');
            $table->date('fecha_emision');
            $table->date('fecha_envio');
            $table->string('localizacion');
            $table->timestamps();
            $table->foreign('modelo_tarjeta_id')->references('id')->on('modelos_tarjetas');
            $table->foreign('operadora_id')->references('id')->on('operadoras');
            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->softDeletes();
        });

        Schema::create('tarjetas_imagenes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tarjeta_id');
            $table->unsignedInteger('orden');
            $table->string('imagen');
            $table->timestamps();
            $table->foreign('tarjeta_id')->references('id')->on('tarjetas');
            $table->softDeletes();
        });

        Schema::create('tarjetas_preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tarjeta_id');
            $table->unsignedInteger('tipo_pregunta_id');
            $table->string('descripcion');
            $table->unsignedInteger('puntaje');
            $table->unsignedInteger('obligatorio');
            $table->unsignedInteger('orden');
            $table->timestamps();
            $table->foreign('tarjeta_id')->references('id')->on('tarjetas');
            $table->foreign('tipo_pregunta_id')->references('id')->on('tipos_preguntas');
            $table->softDeletes();
        });

        Schema::create('tarjetas_respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tarjeta_pregunta_id');
            $table->string('descripcion');
            $table->unsignedInteger('puntaje');
            $table->unsignedInteger('orden');
            $table->timestamps();
            $table->foreign('tarjeta_pregunta_id')->references('id')->on('tarjetas_preguntas');
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
        //
    }
}
