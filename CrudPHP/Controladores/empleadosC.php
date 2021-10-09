<?php 

    class EmpleadosC{

        //Registro de empleados

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

        //Mostrar Empleados

        public function MostrarEmpleadosC(){

            $tablaBD = "empleados";

            $respuesta = empleadosM::MostrarEmpleadosM($tablaBD);

            foreach ($respuesta as $key => $value) {
                echo '
                        <tr>
                            <td>'.$value["nombre"].'</td>
                            <td>'.$value["apellido"].'</td>
                            <td>'.$value["email"].'</td>
                            <td>'.$value["puesto"].'</td>
                            <td>$'.$value["salario"].'</td>
                            <td><button>Editar</button></td>
                            <td><button>Borrar</button></td>
                        </tr>
                    ';
            }
        }

            
    }

?>