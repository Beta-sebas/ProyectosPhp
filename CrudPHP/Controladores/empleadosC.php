<?php 

    class EmpleadosC{

        //Registro de empleados

        public function RegistrarEmpleadosC(){

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
                            
                            <td><a href="index.php?ruta=editar&id='.$value["id"].'"><button>Editar</button></a></td>
                            <td><a href="index.php?ruta=empleados&idD='.$value["id"].'"><button>Borrar</button></a></td>
                        </tr>
                    ';
            }
        }

        //Editar Empleados 

        public function EditarEmpleadosC(){

            $datosC = $_GET["id"];

            $tablaBD = "empleados";

            $respuesta = empleadosM::EditarEmpleadosM($tablaBD, $datosC);

            echo '
                    <input type="hidden" value="'.$respuesta["id"].'" name="idEdit" >

                    <input type="text" placeholder="Nombre" value="'.$respuesta["nombre"].'" name="nombreE" required>

                    <input type="text" placeholder="Apellido" value="'.$respuesta["apellido"].'" name="apellidoE" required>
            
                    <input type="email" placeholder="Email" value="'.$respuesta["email"].'" name="emailE" required>
            
                    <input type="text" placeholder="Puesto" value="'.$respuesta["puesto"].'" name="puestoE" required>
            
                    <input type="text" placeholder="Salario" value="'.$respuesta["salario"].'" name="salarioE" required>
            
                    <input type="submit" value="Actualizar">
                    
                ';

        }

        //Actualizar Empleados

        public function ActualizarEmpleadosC(){

            if (isset($_POST["nombreE"])) {
                
                $datosC = array("nombre"=>$_POST["nombreE"], 
                "apellido"=>$_POST["apellidoE"], "email"=>$_POST["emailE"],
                "puesto"=>$_POST["puestoE"], "salario"=>$_POST["salarioE"], "id"=>$_POST["idEdit"]);

                //$id = $_GET["id"];

                $tablaBD = "empleados";

                $respuesta = EmpleadosM::updateEmpleadosM($datosC, $tablaBD);


                if ($respuesta == "Exito") {
                    
                    
                    header("location:index.php?ruta=empleados");

                }else {
                    
                    print "Error al actualizar el Empleado";
                }
            }
        }

        //Eliminar Empleado

        public function EliminarEmpleadosC(){

            if (isset($_GET["idD"])) {
                
                $datosC = $_GET["idD"];

                $tablaBD = "empleados";

                $respuesta = EmpleadosM::EliminarEmpleadosM($datosC, $tablaBD);

                if ($respuesta == "Exito") {
                    
                    
                    header("location:index.php?ruta=empleados");

                }else {
                    
                    print "Error al Eliminar el Empleado";
                }
            }
        }

            
    }

?>