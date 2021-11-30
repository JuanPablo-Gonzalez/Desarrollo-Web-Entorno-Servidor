<?php

    require 'funciones_altaNN.php';
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombreDpto= limpiar($_POST["nombreDpto"]);
    
        altaDeptAutonumerico($nombreDpto);
    }

?>