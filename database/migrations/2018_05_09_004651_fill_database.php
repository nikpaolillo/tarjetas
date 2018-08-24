<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::unprepared("
                INSERT INTO `perfiles` (`descripcion`,`permite_login`, `created_at`) VALUES ('Admin',1, CURRENT_TIMESTAMP);
                INSERT INTO `perfiles` (`descripcion`,`permite_login`, `created_at`) VALUES ('Usuario',1, CURRENT_TIMESTAMP);

                INSERT INTO `operadoras`        (`descripcion`,`logo`,`css`,`css_mobile`,`created_at`) 
                                        VALUES  ('YPF', '','','', CURRENT_TIMESTAMP);


                INSERT INTO `operadoras`        (`descripcion`,`logo`,`css`,`css_mobile`,`created_at`) 
                                        VALUES  ('San Antonio Internacional', '','','', CURRENT_TIMESTAMP);



                INSERT INTO `users` (`nombre`, `apellido`, `usuario`, `requiere_cambio`, `bloqueado`, `super_admin`, `created_at`) VALUES ('nombre', 'apellido', 'superadmin', 
                     '0', '0', 1, CURRENT_TIMESTAMP );

                INSERT INTO `users` (`nombre`, `apellido`, `usuario`, `requiere_cambio`, `bloqueado`, `super_admin`, `created_at`) VALUES ('nombre', 'apellido', 'admin', 
                     '0', '0', 0, CURRENT_TIMESTAMP );

                INSERT INTO `users` (`nombre`, `apellido`, `usuario`, `requiere_cambio`, `bloqueado`, `super_admin`, `created_at`) VALUES ('nombre', 'apellido', 'usuario@ypf', 
                     '0', '0', 0, CURRENT_TIMESTAMP );

                INSERT INTO `users` (`nombre`, `apellido`, `usuario`, `requiere_cambio`, `bloqueado`, `super_admin`, `created_at`) VALUES ('nombre', 'apellido', 'usuario@sai', 
                     '0', '0', 0, CURRENT_TIMESTAMP );


                INSERT INTO `operadora_perfil_usuario` (`usuario_id`, `operadora_id`, `perfil_id`, `created_at`) VALUES ('1', '1', '1', CURRENT_TIMESTAMP);
                INSERT INTO `operadora_perfil_usuario` (`usuario_id`, `operadora_id`, `perfil_id`, `created_at`) VALUES ('2', '1', '2', CURRENT_TIMESTAMP);
                INSERT INTO `operadora_perfil_usuario` (`usuario_id`, `operadora_id`, `perfil_id`, `created_at`) VALUES ('3', '2', '2', CURRENT_TIMESTAMP);


                INSERT INTO `ubicaciones` (`descripcion`, `created_at`, `padre_id`) VALUES ('Argentina', CURRENT_TIMESTAMP, NULL);
                INSERT INTO `ubicaciones` (`descripcion`, `created_at`, `padre_id`) VALUES ('Distrito Norte', CURRENT_TIMESTAMP, 1);
                INSERT INTO `ubicaciones` (`descripcion`, `created_at`, `padre_id`) VALUES ('Distrito Oeste', CURRENT_TIMESTAMP, 1);
                INSERT INTO `ubicaciones` (`descripcion`, `created_at`, `padre_id`) VALUES ('Distrito Sur', CURRENT_TIMESTAMP, 1);
                INSERT INTO `ubicaciones` (`descripcion`, `created_at`, `padre_id`) VALUES ('Distrito Chubut', CURRENT_TIMESTAMP, 5);
                INSERT INTO `ubicaciones` (`descripcion`, `created_at`, `padre_id`) VALUES ('Distrito Santa Cruz', CURRENT_TIMESTAMP, 5);
                INSERT INTO `ubicaciones` (`descripcion`, `created_at`, `padre_id`) VALUES ('Mendoza', CURRENT_TIMESTAMP, 2);
                INSERT INTO `ubicaciones` (`descripcion`, `created_at`, `padre_id`) VALUES ('Malargue', CURRENT_TIMESTAMP, 2);
                INSERT INTO `ubicaciones` (`descripcion`, `created_at`, `padre_id`) VALUES ('Neuquen', CURRENT_TIMESTAMP, 3);
                INSERT INTO `ubicaciones` (`descripcion`, `created_at`, `padre_id`) VALUES ('Rincon de Los Sauces', CURRENT_TIMESTAMP, 3);
                INSERT INTO `ubicaciones` (`descripcion`, `created_at`, `padre_id`) VALUES ('Catriel', CURRENT_TIMESTAMP, 3);
                INSERT INTO `ubicaciones` (`descripcion`, `created_at`, `padre_id`) VALUES ('Comodoro Rivadavia', CURRENT_TIMESTAMP, 4);
                INSERT INTO `ubicaciones` (`descripcion`, `created_at`, `padre_id`) VALUES ('Caleta Olivia', CURRENT_TIMESTAMP, 5);


                INSERT INTO `categorias` (`descripcion`, `created_at`, `padre_id`) VALUES ('Equipos de Perforacion', CURRENT_TIMESTAMP, NULL);
                INSERT INTO `categorias` (`descripcion`, `created_at`, `padre_id`) VALUES ('Drilling', CURRENT_TIMESTAMP, 1);
                INSERT INTO `categorias` (`descripcion`, `created_at`, `padre_id`) VALUES ('Workover', CURRENT_TIMESTAMP, 1);
                INSERT INTO `categorias` (`descripcion`, `created_at`, `padre_id`) VALUES ('Pulling', CURRENT_TIMESTAMP, 1);
                INSERT INTO `categorias` (`descripcion`, `created_at`, `padre_id`) VALUES ('Drilling >5000HP', CURRENT_TIMESTAMP, 2);
                INSERT INTO `categorias` (`descripcion`, `created_at`, `padre_id`) VALUES ('Drilling <5000HP', CURRENT_TIMESTAMP, 2);
                
                INSERT INTO `clasificaciones` (`descripcion`, `created_at`, `padre_id`) VALUES ('Drilling', CURRENT_TIMESTAMP, NULL);
                INSERT INTO `clasificaciones` (`descripcion`, `created_at`, `padre_id`) VALUES ('Servicios Integrados', CURRENT_TIMESTAMP, NULL);

                INSERT INTO `equipos` (`descripcion`, `created_at`) VALUES ('SAI 317', CURRENT_TIMESTAMP);
                INSERT INTO `equipos` (`descripcion`, `created_at`) VALUES ('SAI 214', CURRENT_TIMESTAMP);
                INSERT INTO `equipos` (`descripcion`, `created_at`) VALUES ('SAI 135', CURRENT_TIMESTAMP);
                INSERT INTO `equipos` (`descripcion`, `created_at`) VALUES ('SAI 110', CURRENT_TIMESTAMP);

                INSERT INTO `roles` (`descripcion`, `created_at`) VALUES ('Owner', CURRENT_TIMESTAMP);
                INSERT INTO `roles` (`descripcion`, `created_at`) VALUES ('Company Man', CURRENT_TIMESTAMP);


                INSERT INTO `categoria_equipo` (`equipo_id`,`categoria_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (1,3, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `categoria_equipo` (`equipo_id`,`categoria_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (2,4, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `categoria_equipo` (`equipo_id`,`categoria_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (3,5, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `categoria_equipo` (`equipo_id`,`categoria_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (4,6, '20180509', NULL, CURRENT_TIMESTAMP);

                INSERT INTO `clasificacion_equipo` (`equipo_id`,`clasificacion_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (1,1, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `clasificacion_equipo` (`equipo_id`,`clasificacion_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (2,1, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `clasificacion_equipo` (`equipo_id`,`clasificacion_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (3,1, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `clasificacion_equipo` (`equipo_id`,`clasificacion_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (4,1, '20180509', NULL, CURRENT_TIMESTAMP);

                INSERT INTO `equipo_ubicacion` (`equipo_id`,`ubicacion_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (1,7, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `equipo_ubicacion` (`equipo_id`,`ubicacion_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (2,9, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `equipo_ubicacion` (`equipo_id`,`ubicacion_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (3,10, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `equipo_ubicacion` (`equipo_id`,`ubicacion_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (4,11, '20180509', NULL, CURRENT_TIMESTAMP);

                INSERT INTO `equipo_operadora_rol` (`equipo_id`,`operadora_id`,`rol_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (1,2,1, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `equipo_operadora_rol` (`equipo_id`,`operadora_id`,`rol_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (1,1,2, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `equipo_operadora_rol` (`equipo_id`,`operadora_id`,`rol_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (2,2,1, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `equipo_operadora_rol` (`equipo_id`,`operadora_id`,`rol_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (2,1,2, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `equipo_operadora_rol` (`equipo_id`,`operadora_id`,`rol_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (3,2,1, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `equipo_operadora_rol` (`equipo_id`,`operadora_id`,`rol_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (3,1,2, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `equipo_operadora_rol` (`equipo_id`,`operadora_id`,`rol_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (4,2,1, '20180509', NULL, CURRENT_TIMESTAMP);
                INSERT INTO `equipo_operadora_rol` (`equipo_id`,`operadora_id`,`rol_id`, `fecha_desde`, `fecha_hasta`, `created_at`) VALUES (4,1,2, '20180509', NULL, CURRENT_TIMESTAMP);
                
                INSERT INTO `estados` (`descripcion`, `created_at`) VALUES ('Generado', CURRENT_TIMESTAMP);
                INSERT INTO `estados` (`descripcion`, `created_at`) VALUES ('En revision', CURRENT_TIMESTAMP);
                INSERT INTO `estados` (`descripcion`, `created_at`) VALUES ('Aprobado', CURRENT_TIMESTAMP);
                INSERT INTO `estados` (`descripcion`, `created_at`) VALUES ('Rechazado', CURRENT_TIMESTAMP);
                INSERT INTO `estados` (`descripcion`, `created_at`) VALUES ('No divulgar', CURRENT_TIMESTAMP);

                INSERT INTO `tipos_preguntas` (`descripcion`, `abreviatura`, `respuesta_restringida`, `maximas_respuestas`, `created_at`) VALUES ('Multiple Choice (Single)', 'S', 1, 1, CURRENT_TIMESTAMP);
                INSERT INTO `tipos_preguntas` (`descripcion`, `abreviatura`, `respuesta_restringida`, `maximas_respuestas`, `created_at`) VALUES ('Multiple Choice (Multiple)', 'M', 1, 999, CURRENT_TIMESTAMP);
                INSERT INTO `tipos_preguntas` (`descripcion`, `abreviatura`, `respuesta_restringida`, `maximas_respuestas`, `created_at`) VALUES ('A Desarrollar', 'D', 0, 0, CURRENT_TIMESTAMP);

                INSERT INTO `modelos_tarjetas` (`descripcion`, `operadora_id`, `puntaje`, `orden`, `css`, `css_mobile`, `created_at`) VALUES ('Enfocate', 1, 100, 10, '','', CURRENT_TIMESTAMP);

                INSERT INTO `modelos_tarjetas_preguntas` (`id`, `modelo_tarjeta_id`, `tipo_pregunta_id`, `orden`, `descripcion`, `puntaje`, `obligatorio`, `created_at`, `updated_at`, `deleted_at`) VALUES
                (1, 1, 1, 20, 'Equipo de Proteccion Personal', 0, 0, '2018-01-29 08:06:33', '2018-01-29 08:14:24', NULL),
                (2, 1, 1, 30, 'Procedimiento de Trabajo', 0, 1, '2018-01-29 08:11:16', '2018-01-29 08:14:22', NULL),
                (3, 1, 1, 40, 'Herramientas y equipos', 0, 1, '2018-01-29 08:11:41', '2018-01-29 08:14:19', NULL),
                (4, 1, 1, 50, 'Reacciones de las Personas', 0, 1, '2018-01-29 08:12:01', '2018-01-29 08:14:16', NULL),
                (5, 1, 1, 60, 'Ubicacion y Posturas', 0, 1, '2018-01-29 08:12:25', '2018-01-29 08:14:14', NULL),
                (6, 1, 1, 70, 'Permisos y controles', 0, 1, '2018-01-29 08:12:42', '2018-01-29 08:14:10', NULL),
                (7, 1, 1, 10, 'Clasificacion', 0, 1, '2018-01-29 08:13:29', '2018-01-29 08:14:28', NULL),
                (8, 1, 1, 80, 'Se decidio detener la tarea', 0, 1, '2018-01-29 08:13:59', '2018-01-29 08:14:37', NULL),
                (9, 1, 1, 90, 'Requiere accion de seguimiento', 0, 1, '2018-01-29 08:15:02', '2018-01-29 08:16:17', NULL),
                (10, 1, 3, 100, 'Descripcion del acto inseguro', 0, 1, '2018-01-29 08:15:40', '2018-01-29 08:16:14', NULL),
                (11, 1, 3, 110, 'Accion inmediata Tomada', 0, 0, '2018-01-29 08:15:59', '2018-01-29 08:16:11', NULL);

                INSERT INTO `modelos_tarjetas_respuestas` (`id`, `modelo_tarjeta_pregunta_id`, `orden`, `descripcion`, `puntaje`, `created_at`, `updated_at`, `deleted_at`) VALUES
                (1, 1, 10, 'En Condiciones inapropiadas', 0, '2018-01-29 08:35:32', NULL, NULL),
                (2, 1, 20, 'No adecuado para la tarea', 0, '2018-01-29 08:35:32', NULL, NULL),
                (3, 1, 30, 'Uso incorrecto', 0, '2018-01-29 08:35:32', NULL, NULL),
                (4, 1, 40, 'No disponible', 0, '2018-01-29 08:35:32', NULL, NULL),
                (5, 2, 10, 'No se aplican en forma adecuada', 0, '2018-01-29 08:35:32', NULL, NULL),
                (6, 2, 20, 'No adecuados a la tarea', 0, '2018-01-29 08:35:32', NULL, NULL),
                (7, 2, 30, 'No se conocen o no se entienden', 0, '2018-01-29 08:35:33', NULL, NULL),
                (8, 2, 40, 'No existen procedimientos', 0, '2018-01-29 08:35:33', NULL, NULL),
                (9, 3, 10, 'En condiciones inapropiadas', 0, '2018-01-29 08:35:33', NULL, NULL),
                (10, 3, 20, 'No adecuado para la tarea', 0, '2018-01-29 08:35:33', NULL, NULL),
                (11, 3, 30, 'Uso incorrecto', 0, '2018-01-29 08:35:33', NULL, NULL),
                (12, 3, 40, 'No sabe utilizar la herramienta / equipo', 0, '2018-01-29 08:35:33', NULL, NULL),
                (13, 4, 10, 'No sigue recomendaciones', 0, '2018-01-29 08:35:33', NULL, NULL),
                (14, 4, 20, 'Indiferente al momento de la observacion', 0, '2018-01-29 08:35:33', NULL, NULL),
                (15, 4, 30, 'No detiene su tarea', 0, '2018-01-29 08:35:33', NULL, NULL),
                (16, 4, 40, 'Reaccion negativa durante la observacion', 0, '2018-01-29 08:35:33', NULL, NULL),
                (17, 5, 10, 'Manos y/o pies en zonas de pellizos', 0, '2018-01-29 08:35:33', NULL, NULL),
                (18, 5, 20, 'Ubicacion en linea de caida de objetos', 0, '2018-01-29 08:35:33', NULL, NULL),
                (19, 5, 30, 'Posturas inadecuadas para la tarea', 0, '2018-01-29 08:35:33', NULL, NULL),
                (20, 5, 40, 'Ubicacion en radio de accion y/o desplazamiento de', 0, '2018-01-29 08:35:33', NULL, NULL),
                (21, 6, 10, 'No se gestionara Permisos de Trabajo', 0, '2018-01-29 08:35:33', NULL, NULL),
                (22, 6, 20, 'No se realizo el ATS de forma adecuada', 0, '2018-01-29 08:35:33', NULL, NULL),
                (23, 6, 30, 'Inadecuado uso de bloqueos y barrearas', 0, '2018-01-29 08:35:33', NULL, NULL),
                (24, 6, 40, 'No se identifica y/o gestiona los cambios', 0, '2018-01-29 08:35:33', NULL, NULL),
                (25, 7, 10, 'Acto Inseguro', 0, '2018-01-29 08:35:33', NULL, NULL),
                (26, 7, 20, 'Condecion Insegura', 0, '2018-01-29 08:35:33', NULL, NULL),
                (27, 7, 30, 'Todo Seguro/Reconocimiento', 0, '2018-01-29 08:35:33', NULL, NULL),
                (28, 8, 10, 'Si', 0, '2018-01-29 08:35:33', NULL, NULL),
                (29, 8, 20, 'No', 0, '2018-01-29 08:35:33', NULL, NULL),
                (30, 9, 10, 'Si', 0, '2018-01-29 08:35:33', NULL, NULL),
                (31, 9, 20, 'No', 0, '2018-01-29 08:35:33', NULL, NULL);");
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
