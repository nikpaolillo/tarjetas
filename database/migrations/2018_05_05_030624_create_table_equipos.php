<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEquipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100)->unique();
            $table->unsignedInteger('padre_id')->nullable();
            $table->timestamps();
            $table->foreign('padre_id')->references('id')->on('categorias');
            $table->softDeletes();
        });

        Schema::create('clasificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100)->unique();
            $table->unsignedInteger('padre_id')->nullable();
            $table->timestamps();
            $table->foreign('padre_id')->references('id')->on('clasificaciones');
            $table->softDeletes();
        });


        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100)->unique();
            $table->unsignedInteger('padre_id')->nullable();
            $table->timestamps();
            $table->foreign('padre_id')->references('id')->on('ubicaciones');
            $table->softDeletes();
        });


        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100)->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('categoria_equipo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('equipo_id');
            $table->unsignedInteger('categoria_id');
            $table->date('fecha_desde');
            $table->date('fecha_hasta')->nullable();
            $table->timestamps();
            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->softDeletes();
        });

        Schema::create('clasificacion_equipo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('equipo_id');
            $table->unsignedInteger('clasificacion_id');
            $table->date('fecha_desde');
            $table->date('fecha_hasta')->nullable();
            $table->timestamps();
            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->foreign('clasificacion_id')->references('id')->on('clasificaciones');
            $table->softDeletes();
        });

        Schema::create('equipo_ubicacion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('equipo_id');
            $table->unsignedInteger('ubicacion_id');
            $table->date('fecha_desde');
            $table->date('fecha_hasta')->nullable();
            $table->timestamps();
            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->foreign('ubicacion_id')->references('id')->on('ubicaciones');
            $table->softDeletes();
        });


        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100)->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('equipo_operadora_rol', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('equipo_id');
            $table->unsignedInteger('operadora_id');
            $table->unsignedInteger('rol_id');
            $table->date('fecha_desde');
            $table->date('fecha_hasta')->nullable();
            $table->timestamps();
            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->foreign('operadora_id')->references('id')->on('operadoras');
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
        Schema::dropIfExists('equipo_operadora_rol');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('equipo_ubicacion');
        Schema::dropIfExists('equipo_categoria');
        Schema::dropIfExists('equipo_clasificacion');
        Schema::dropIfExists('clasificaciones');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('ubicaciones');
        Schema::dropIfExists('equipos');
    }
}
