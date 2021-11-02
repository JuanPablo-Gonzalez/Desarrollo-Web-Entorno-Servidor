<?php

require 'funciones_datos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = test_input($_POST["nombre"]);
    $apellido1 = test_input($_POST["apellido1"]);
    $apellido2 = test_input($_POST["apellido2"]);
    $email = test_input($_POST["email"]);
    $sexo = test_input($_POST["sexo"]);
}

//var_dump($_POST);

comprobarCampoVacio($nombre,$apellido1,$email);
devolverDatos($nombre,$apellido1,$apellido2,$email,$sexo);

?>