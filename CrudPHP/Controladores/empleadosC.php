<?php 

    class EmpleadosC{

        public function registrarEmpleadosC(){

            if (isset($_POST["nombreR"])) {
                
                $datosC = array("nombre"=>$_POST["nombreR"], 
                "apellido"=>$_POST["apellidoR"], "email"=>$_POST["emailR"],
                "puesto"=>$_POST["puestoR"], "salario"=>$_POST["salarioR"]);

                $tablaBD = "empleados";

                $respuesta = EmpleadosM::registrarEmpleadosM($datosC, $tablaBD);

                if ($respuesta == "Exito") {
                    
                    header("location:index.php?ruta=empleados");

                }else {
                    
                    print "Error al registrar Empleado";
                }
            }

        }
            
    }

?>