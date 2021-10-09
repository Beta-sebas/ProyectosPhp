<?php

    require_once "conexionBD.php";

    class AdminM extends ConexionBD{

        public static function ingresoM($datosC, $tablaBD){

            //el prepare del PDO, Prepara una sentencia sql para ser ejecutada por el metodo execute
            $pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave FROM $tablaBD WHERE USUARIO = :usuario");

            /*la siguiente linea se usa para enlazar parametros
            El bindParam vincula una variable PHP a un parametro 
            de sustitución que corresponde a la sentencia sql 
            */
            $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

            $pdo -> execute();

            return $pdo-> fetch();

            $pdo -> closeCursor();

        }
    }

?>