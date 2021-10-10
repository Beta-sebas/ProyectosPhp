<?php 

    require_once "ConexionBD.php";

    class EmpleadosM extends ConexionBD{

        //Registrar Empleados

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

        //Mostrar Empleados

        public static function MostrarEmpleadosM($tablaBD){

            $pdo = ConexionBD::cBD()->prepare("SELECT id, nombre, apellido, email, puesto, salario 
            FROM $tablaBD ");

            $pdo -> execute();

            return $pdo -> fetchAll();

            $pdo = null;
        }

        //Editar Empleados 

        public static function EditarEmpleadosM($tablaBD, $datosC){

            $pdo = ConexionBD::cBD()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tablaBD 
            WHERE id = :id");

            $pdo ->bindParam(":id", $datosC, PDO::PARAM_INT);

            $pdo -> execute();

            return $pdo -> fetch();

            $pdo = null;
        } 

        public static function updateEmpleadosM($datosC, $tablaBD){

            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre, apellido = :apellido
            , email = :email, puesto = :puesto, salario = :salario WHERE id = :id");

            $var=$datosC["id"];
            $pdo -> bindParam(":id", $var, PDO::PARAM_INT);
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