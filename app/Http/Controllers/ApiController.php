<?php

namespace TarjetasProactividad\Http\Controllers;

use Illuminate\Http\Request;
use TarjetasProactividad\Operadora;
use TarjetasProactividad\OperadoraPerfilUsuario;
use TarjetasProactividad\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ApiController extends Controller
{
    
    use AuthenticatesUsers;


    public function operadoras()
    {
        $operadoras = Operadora::select("id","descripcion")->where("deleted_at",null)->get();       
        return $operadoras;
    }








    public function ingresar(Request $request)
    {

        
        $usuario = User::where("usuario",$request->usuario)->where("password",$request->password)->first();

        if (!$usuario){
            $ret = [];
            $ret['status'] = "ERROR";
            $ret['mensaje'] = "Alguno de los datos brindados es incorrecto";
            return json_encode($ret); 
        }


        return $this->parametrosMobile($usuario);

    }


    public function nuevasTarjetas(Request $request)
    {
    	dd($request->all());

    }

    private function parametrosMobile($usuario){
        
        if ($usuario->bloqueado){
            $ret = [];
            $ret['status'] = "ERROR";
            $ret['mensaje'] = "El usuario seleccionado se encuentra bloqueado";
            return json_encode($ret); 
        }

        $ret = [];
        $ret['status'] = "OK";
        $ret['mensaje'] = "Sesion Iniciada";

        $ret['usuario'] =   [
                                'id'=>$usuario->id,
                                'email'=>$usuario->email,
                                'nombre'=>$usuario->nombre,
                                'apellido'=>$usuario->apellido,
                            ];



        $operadoras = OperadoraPerfilUsuario::where("usuario_id",$usuario->id)->where("deleted_at",null)->get();
        


        foreach ($operadoras   as $keyOperadora => $operadora) {
            $ret['usuario']['operadoras'][$keyOperadora]['id']=$operadora->Operadora->id;        
            $ret['usuario']['operadoras'][$keyOperadora]['descripcion']=$operadora->Operadora->descripcion;        
            

            $modeloTarjetas = $operadora->Operadora->ModelosTarjetas; 
            
            foreach ($modeloTarjetas as $keyTarjeta => $modeloTarjeta) {
                $ret['usuario']['operadoras'][$keyOperadora]['tarjetas'][$keyTarjeta]['id'] = 

                [
                    'id' => $modeloTarjeta->id,
                    'descripcion' => $modeloTarjeta->descripcion,
                    'orden' => $modeloTarjeta->orden,
                    'puntaje' => $modeloTarjeta->puntaje,
                ];


                $modeloTarjeta->load(["ModeloTarjetaPreguntas"]);

                foreach ($modeloTarjeta->ModeloTarjetaPreguntas as $keyTarjetaPregunta => $modeloTarjetaPregunta) {
                    
                    $modeloTarjetaPregunta->load(["ModeloTarjetaRespuestas"]);

                    $ret['usuario']['operadoras'][$keyOperadora]['tarjetas'][$keyTarjeta]['preguntas'][$keyTarjetaPregunta]['id'] = 

                    [
                        'descripcion' => $modeloTarjetaPregunta->descripcion,
                        'orden' => $modeloTarjetaPregunta->orden,
                        'puntaje' => $modeloTarjetaPregunta->puntaje,
                        'obligatorio' => $modeloTarjetaPregunta->obligatorio,
                        'maximas_respuestas' => $modeloTarjetaPregunta->maximas_respuestas,
              /*          'tipo_pregunta' =>  [
                                                'abreviatura' => $modeloTarjetaPregunta->TipoPregunta->abreviatura,
                                                'descripcion' => $modeloTarjetaPregunta->TipoPregunta->descripcion,
                                            ], */
                    ];


                    foreach ($modeloTarjetaPregunta->ModeloTarjetaRespuestas as $keyTarjetaRespuesta => $modeloTarjetaRespuesta) {
                        $ret['usuario']['operadoras'][$keyOperadora]['tarjetas'][$keyTarjeta]['preguntas'][$keyTarjetaPregunta]['respuestas'][$keyTarjetaRespuesta] = 

                        [
                            'descripcion' => $modeloTarjetaRespuesta->descripcion,
                            'orden' => $modeloTarjetaRespuesta->orden,
                            'puntaje' => $modeloTarjetaRespuesta->puntaje,
                        ];
                        


                    }
                    


                }


            }


        }
             

        return $ret;

    }


}

