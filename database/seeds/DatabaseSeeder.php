<?php

use Illuminate\Database\Seeder;
use TarjetasProactividad\Operadora;
use TarjetasProactividad\ModeloTarjeta;
use TarjetasProactividad\ModeloTarjetaPregunta;
use TarjetasProactividad\ModeloTarjetaRespuesta;
use TarjetasProactividad\TipoPregunta;
use TarjetasProactividad\Perfil;
use TarjetasProactividad\User;
use TarjetasProactividad\OperadoraPerfilUsuario;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as Carbon;

class DatabaseSeeder extends Seeder
{
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $respuestas=ModeloTarjetaRespuesta::all();

        foreach ($respuestas  as $value) {
                $value->delete();
        }

        $preguntas=ModeloTarjetaPregunta::all();

        foreach ($preguntas  as $value) {
                $value->delete();
        }

        $tarjetas=ModeloTarjeta::all();

        foreach ($tarjetas  as $value) {
                $value->delete();
        }

        $tiposPreguntas=TipoPregunta::all();

        foreach ($tiposPreguntas  as $value) {
                $value->delete();
        }


    	 $operadoraPerfilUsuario=OperadoraPerfilUsuario::all();

        foreach ($operadoraPerfilUsuario  as $value) {
                $value->delete();
        }

        $operadoras=Operadora::all();

        foreach ($operadoras  as $value) {
                $value->delete();
        }



        $perfiles=Perfil::all();

        foreach ($perfiles  as $value) {
                $value->delete();
        }


        $perfiles = [
            [
                'descripcion' => 'Admin',
                'permite_login'=>true,
                'created_at' => Carbon::now(),
            ],
            [
                'descripcion' => 'User',
                'permite_login'=>true,
                'created_at' => Carbon::now(),
            ],
        ];

        DB::table('perfiles')->insert($perfiles);

        $operadoras = [
            [
                'descripcion' => 'San Antonio Internacional',
                'css' => '',
                'css_mobile' => '',
                'logo' => '',
                'created_at' => Carbon::now(),
            ],
            [
                'descripcion' => 'YPF',
                'css' => '',
                'css_mobile' => '',
                'logo' => '',
                'created_at' => Carbon::now(),
            ],
            [
                'descripcion' => 'DLS',
                'css' => '',
                'css_mobile' => '',
                'logo' => '',
                'created_at' => Carbon::now(),
            ],
        ];

        DB::table('operadoras')->insert($operadoras);

        $operadoraPerfilUsuario=[
            [
                'usuario_id'=>User::where("usuario","lavila")->first()->id,
                'operadora_id'=>Operadora::where("descripcion","San Antonio Internacional")->first()->id,
                'perfil_id'=>Perfil::where("descripcion","Admin")->first()->id,
                'created_at' => Carbon::now(),
            ],
            [
                'usuario_id'=>User::where("usuario","lavila")->first()->id,
                'operadora_id'=>Operadora::where("descripcion","YPF")->first()->id,
                'perfil_id'=>Perfil::where("descripcion","User")->first()->id,
                'created_at' => Carbon::now(),
            ],
            [
                'usuario_id'=>User::where("usuario","lavila")->first()->id,
                'operadora_id'=>Operadora::where("descripcion","DLS")->first()->id,
                'perfil_id'=>Perfil::where("descripcion","User")->first()->id,
                'created_at' => Carbon::now(),
            ],
        ];

        DB::table('operadora_perfil_usuario')->insert($operadoraPerfilUsuario);


        $tiposPreguntas=[
            [
                'descripcion'=>'Descripcion',
                'abreviatura'=>'D',
                'respuesta_restringida'=>false,
                'maximas_respuestas'=>'1',
                'created_at' => Carbon::now(),
            ],
            [
                'descripcion'=>'Multiple Choice',
                'abreviatura'=>'M',
                'respuesta_restringida'=>false,
                'maximas_respuestas'=>'99',
                'created_at' => Carbon::now(),
            ],
            [
                'descripcion'=>'Single Choice',
                'abreviatura'=>'S',
                'respuesta_restringida'=>false,
                'maximas_respuestas'=>'1',
                'created_at' => Carbon::now(),
            ],
        ];

        DB::table('tipos_preguntas')->insert($tiposPreguntas);

        $modelosTarjetas=[
            [
                'descripcion' =>'Enfocate',
                'operadora_id'=>Operadora::where("descripcion","San Antonio Internacional")->first()->id,
                'puntaje'=>100,
                'orden'=>10,
                'css'=>'',
                'css_mobile'=>'',
                'created_at' => Carbon::now(),
            ],
            [
                'descripcion' =>'Enviroment',
                'operadora_id'=>Operadora::where("descripcion","San Antonio Internacional")->first()->id,
                'puntaje'=>30,
                'orden'=>20,
                'css'=>'',
                'css_mobile'=>'',
                'created_at' => Carbon::now(),
            ],
            [
                'descripcion' =>'Acompañame',
                'operadora_id'=>Operadora::where("descripcion","San Antonio Internacional")->first()->id,
                'puntaje'=>10,
                'orden'=>30,
                'css'=>'',
                'css_mobile'=>'',
                'created_at' => Carbon::now(),
            ],
        ];

        DB::table('modelos_tarjetas')->insert($modelosTarjetas);


        $modelosTarjetasPreguntas=[
            [
                'modelo_tarjeta_id' => ModeloTarjeta::where("descripcion",'Enfocate')->where("operadora_id",Operadora::where("descripcion","San Antonio Internacional")->first()->id)->first()->id,
                'tipo_pregunta_id'=>TipoPregunta::where("abreviatura","M")->first()->id,
                'descripcion'=>'¿Como te sentis hoy?',
                'orden'=>10,
                'puntaje'=>100,
                'obligatorio'=>true,
                'maximas_respuestas'=>1,
                'created_at' => Carbon::now(),
            ],

            [
                'modelo_tarjeta_id' => ModeloTarjeta::where("descripcion",'Enfocate')->where("operadora_id",Operadora::where("descripcion","San Antonio Internacional")->first()->id)->first()->id,
                'tipo_pregunta_id'=>TipoPregunta::where("abreviatura","M")->first()->id,
                'descripcion'=>'¿Estas contento en tu ambiente de trabajo?',
                'orden'=>20,
                'puntaje'=>100,
                'obligatorio'=>true,
                'maximas_respuestas'=>1,
                'created_at' => Carbon::now(),
            ],
        ];

        DB::table('modelos_tarjetas_preguntas')->insert($modelosTarjetasPreguntas);

        $modelosTarjetasRespuestas=[
            [
                'modelo_tarjeta_pregunta_id' => ModeloTarjetaPregunta::where("descripcion",'¿Como te sentis hoy?')->first()->id,
                'descripcion'=>'Muy Bien',
                'orden'=>10,
                'puntaje'=>100,
                'created_at' => Carbon::now(),
            ],

            [
                'modelo_tarjeta_pregunta_id' => ModeloTarjetaPregunta::where("descripcion",'¿Como te sentis hoy?')->first()->id,
                'descripcion'=>'Regular',
                'orden'=>20,
                'puntaje'=>100,
                'created_at' => Carbon::now(),
            ],

            [
                'modelo_tarjeta_pregunta_id' => ModeloTarjetaPregunta::where("descripcion",'¿Como te sentis hoy?')->first()->id,
                'descripcion'=>'Mal',
                'orden'=>30,
                'puntaje'=>000,
                'created_at' => Carbon::now(),
            ],



            [
                'modelo_tarjeta_pregunta_id' => ModeloTarjetaPregunta::where("descripcion",'¿Estas contento en tu ambiente de trabajo?')->first()->id,
                'descripcion'=>'Si',
                'orden'=>10,
                'puntaje'=>100,
                'created_at' => Carbon::now(),
            ],

            [
                'modelo_tarjeta_pregunta_id' => ModeloTarjetaPregunta::where("descripcion",'¿Estas contento en tu ambiente de trabajo?')->first()->id,
                'descripcion'=>'No',
                'orden'=>20,
                'puntaje'=>100,
                'created_at' => Carbon::now(),
            ],

        ];

        DB::table('modelos_tarjetas_respuestas')->insert($modelosTarjetasRespuestas);
       
    }



 


}
