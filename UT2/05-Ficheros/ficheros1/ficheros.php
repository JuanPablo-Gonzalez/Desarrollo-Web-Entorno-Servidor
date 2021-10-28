<?php

    require 'funciones_ficheros.php';

    $nombre= $_POST["nombre"];
    $apellido1= $_POST["apellido1"];
    $apellido2= $_POST["apellido2"];
    $fechaNac= $_POST["nacimiento"];
    $localidad= $_POST["localidad"];

    crearFichero($nombre,$apellido1,$apellido2,$fechaNac,$localidad);

?>