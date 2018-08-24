<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableModeloTarjetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos_tarjetas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100);
            $table->unsignedInteger('operadora_id');
            $table->unsignedInteger('puntaje');
            $table->unsignedInteger('orden');
            $table->string('css');
            $table->string('css_mobile');
            $table->timestamps();
            $table->foreign('operadora_id')->references('id')->on('operadoras');
            $table->softDeletes();
        });

        Schema::create('tipos_preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100)->unique();
            $table->string('abreviatura',5)->unique();
            $table->boolean('respuesta_restringida');
            $table->unsignedInteger('maximas_respuestas');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('modelos_tarjetas_preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('modelo_tarjeta_id');
            $table->string('descripcion');
            $table->unsignedInteger('tipo_pregunta_id');
            $table->unsignedInteger('orden');
            $table->unsignedInteger('puntaje');
            $table->boolean('obligatorio');
            $table->unsignedInteger('maximas_respuestas');
            $table->timestamps();
            $table->foreign('modelo_tarjeta_id')->references('id')->on('modelos_tarjetas');
            $table->softDeletes();
        });

        Schema::create('modelos_tarjetas_respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('modelo_tarjeta_pregunta_id');
            $table->string('descripcion');
            $table->unsignedInteger('orden');
            $table->unsignedInteger('puntaje');
            $table->timestamps();
            $table->foreign('modelo_tarjeta_pregunta_id')->references('id')->on('modelos_tarjetas_preguntas');
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
