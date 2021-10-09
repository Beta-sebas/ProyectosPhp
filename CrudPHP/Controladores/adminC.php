<?php 

    class AdminC{

        public function IngresoC(){

            if (isset($_POST["usuarioI"])) {
                
                $datosC = array("usuario"=>$_POST["usuarioI"], "clave"=>$_POST["claveI"]);

                $tablaBD = "administradores";

                $respuesta = AdminM::ingresoM($datosC, $tablaBD);

                if (!$respuesta) {
                    
                    print "Usuario Incorrecto";
                    return false;

                }

                //el indice de respuesta debe ser el titulo de la columna de la BD que estamos retornando

                if ($respuesta["usuario"] == $_POST["usuarioI"] && $respuesta["clave"] == $_POST["claveI"]) {
                    
                    session_start();

                    $_SESSION["ingreso"] = true;

                    header("location:index.php?ruta=empleados");

                }else {
                    
                    print "Contraseña Incorrecta";
                }
            }
        }
    }

?>