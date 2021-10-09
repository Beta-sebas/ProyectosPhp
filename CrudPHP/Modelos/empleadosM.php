<?php 

    require_once "ConexionBD.php";

    class EmpleadosM extends ConexionBD{

        public static function registrarEmpleadosM($datosC, $tablaBD){

            $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre, apellido, email, puesto, salario) VALUES 
            (:nombre, :apellido, :email, :puesto, :salario)");

            $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
            $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
            $pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
            $pdo -> bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);
            $pdo -> bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);

            if ($pdo -> execute()) {
                
                return "Exito";

            }else{

                return "Error";

            }

            $pdo = null;

        }

    }
?>