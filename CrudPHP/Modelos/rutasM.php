<?php

    class Modelo{

        static public function RutasModelo($rutas){

            if ($rutas == "registrar" || $rutas == "ingreso" || $rutas == "empleados" || $rutas == "editar" || $rutas == "salir" ) {
                
                $pagina = "Vistas/modulos/".$rutas.".php";

            }elseif ($rutas == "index") {

                $pagina = "Vistas/modulos/ingreso.php";

            }else {

                $pagina = "Vistas/modulos/ingreso.php";
            }

            return $pagina;

        }

    }

?>