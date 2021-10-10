<?php 

	session_start();

	if (!$_SESSION["ingreso"]) {
		
		header("location:index.php?ruta=ingreso");

		exit();
	}

?>

	<br>
	<h1>EDITAR EMPLEADO</h1>

	<form method="post" action="">
		
        <?php

            $editar = new EmpleadosC();
            $editar -> EditarEmpleadosC();

            $actualizar = new EmpleadosC();
	        $actualizar -> ActualizarEmpleadosC();

        ?>

	</form>

   



