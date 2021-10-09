<?php 

    class ConexionBD{

        public function cBD(){

            //Permite la conexión entre PHP y la BD recibe como paremetros "nombreHost y BD", "UsuarioBD", "passBD"
            $bd = new PDO("mysql:host=localhost;dbname=crudphp", "root", "");

            return $bd;
                            
        }
    }
?>