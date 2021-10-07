<?php
/*-------------------------------------------------------
Universidad del Cauca - Departamento de Telematica
-------------------------------------------------------
Juan Sebastian Betancourt
jsbetancourt@unicauca.edu.co
-------------------------------------------------------
Practica No. 2 - Funciones en PHP
*/
?>
<?php
/* Realización de un calendario utilizando PHP, Html y Css.
*/
function totalDia() {
    $mes = date("m");
    $year = date("Y");
    $dia = date("d");
    $totalDias = date("t", mktime(1, 0, 0, $mes, $dia, $year));
    return $totalDias;
}



if (isset($_POST['mes'])) {
    $mesActual = $_POST['mes'];
} else {
    $mesActual = date("n");   
}
if (isset($_POST['year'])) {
    $anoActual = $_POST['year'];
} else {
    $anoActual = date("Y");   
}

$mes = date("n");
$year = date("Y");
$dia = date("d");
$totalDias = date("t", mktime(1, 0, 0, $mesActual, $dia, $anoActual));
$primerDia = date("w", mktime(1, 0, 0, $mesActual, 1, $anoActual));
$diaActual = date("j");



    function mes($mesActual) {
        
        for ($m=1; $m<=12; $m++){
            if ($mesActual == $m){
                echo '<option value="'.$m.'"selected=selected>'.$m."</option>";
            }else
            echo "<option value=".$m.">".$m."</option>";
        }
    }

    function ano($anoActual, $year) {
        
        if ($anoActual == $year){
            echo '<option value="'.$year.'"selected=selected>'.$year."</option>";
        }else{
            echo '<option value="'.$anoActual.'"selected=selected>'.$anoActual."</option>";
        }

        echo '<option value = "2021">2021</option>';
        echo '<option value = "2022">2022</option>';
        echo '<option value = "2023">2023</option>';
        echo '<option value = "2024">2024</option>';
        
    }
        
    function inicioMes($dia,$actual,$anoActual, $ano) {
        $dia+1;
        if ($actual == $dia && $anoActual == $ano){
            echo '<div class="grid-item dia-actual first-day">1</div>';
        }else
        echo '<div class="grid-item first-day">1</div>';
    }

    function nombreMesActual($mesActual){
        if ($mesActual == "1") {
            $nombreMes = "Enero"; 
        }
        elseif ($mesActual == "2"){
            $nombreMes = "Febrero";
        }
        elseif ($mesActual == "3"){
            $nombreMes = "Marzo";
        }
        elseif ($mesActual == "4"){
            $nombreMes = "Abril";
        }
        elseif ($mesActual == "5"){
            $nombreMes = "Mayo";
        }
        elseif ($mesActual == "6"){
            $nombreMes = "Junio";
        }
        elseif ($mesActual == "7"){
            $nombreMes = "Julio";
        }
        elseif ($mesActual == "8"){
            $nombreMes = "Agosto";
        }
        elseif ($mesActual == "9"){
            $nombreMes = "Septiembre";
        }
        elseif ($mesActual == "10"){
            $nombreMes = "Octubre";
        }
        elseif ($mesActual == "11"){
            $nombreMes = "Noviembre";
        }
        else 
            $nombreMes = "Diciembre";
        return $nombreMes;
    }

?>
    <html>
    <head>
        <title>Practica 2 - Funciones en PHP</title>
        <style>

            .calendario{
                display: flex;
                width: 500px;
                flex-direction: column;
                align-items: center;
            }

            .grid-container {
            display: grid;
            grid-gap: 3px;
            /*grid-template-columns: auto auto auto auto auto auto auto;*/
            grid-template-columns: repeat(7, 1fr);
            align-content: space-between;
            background-color:#c0baca;
            padding: 10px;
            width: 55%;
            border-radius: 0px 0px 20px 20px;
            border: solid 1px;
            }

            .grid-item {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.8);
            font-size: 12px;
            text-align: center;
            border-radius: 5px;
            }

            .grid-item-day {
            
            font-size: 15px;
            text-align: center;
            }

            .dia-actual{
            background-color: #d5d0dd;
            }

            .first-day {
                grid-column-start:<?php echo $primerDia+1; ?> ;
            }

            .botones{
            display: flex;
            width: 59%;
            height: 22px;
            background-color: #ababba;
            border-radius: 10px 10px 0px 0px;
            border: solid 1px;
            }

            span{
            margin-left: 20px;
            font-family: sans-serif;
            font-weight: bold;
            
            }

            label{
            margin-left: 2px;
            font-family: sans-serif;
            font-weight: bold;
            }

            select{
            
            background-color: #ababba;
            font-size: 15px;
            text-align: center;
            border-radius: 10px;
            border: 1px solid rgb(175, 175, 175);
            
            }
            
        </style>
    </head>
    <body>
    
    <div class="calendario">
        <div class="botones">
            <form method="post" id="form">
                <label for="mes">Mes</label>
                <select class="selectorMes" name="mes" id="mes" onchange="actualizar()">
                    <?php
                        mes($mesActual);
                    ?>
		        </select>
                <span><?php echo nombreMesActual($mesActual); ?></span>
                <select class="selectoraño" name="year" id="year" onchange="actualizar()">
                    <?php
                        ano($anoActual, $year);
                    ?>
                </select>
            </form>
        </div>
        <div class="grid-container">
            <div class="grid-item-day">Dom</div>
            <div class="grid-item-day">Lun</div>
            <div class="grid-item-day">Mar</div>
            <div class="grid-item-day">Mie</div>
            <div class="grid-item-day">Jue</div>
            <div class="grid-item-day">Vie</div>
            <div class="grid-item-day">Sab</div>
            <?php 
                inicioMes($primerDia, $diaActual, $anoActual, $year);
                for ($n=2; $n<=$totalDias; $n++ ) {
                    if ($diaActual == $n && ($anoActual === $year) && $mesActual == $mes){
                        echo '<div class="grid-item dia-actual">' .$n .'</div>';
                    }else
                    echo '<div class="grid-item">' .$n .'</div>';
                }
            ?>
        </div>
    </div>
    <?php
    //Función para obtener la hora del sistema 
    function hora() {
    $h = date("g:i:s A");
    return ($h);
    }
    function suma ($a, $b) {
    return ($a + $b);
    }
    $d = 5; $e = 8;
    print "<br> Hora: ".hora()."<br>";
    print "Suma: ".suma($d,$e)."<br>";
    ?>

    <script language="javascript">

    function actualizar() {
        document.getElementById("form").submit();
    }

    </script>

    </body>
    </html>