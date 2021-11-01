<?php

    require 'funciones_ficheros.php';

    /* TERMINAR ESTO.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nombre"])) {
          echo "Nombre está vacío";
        } else {
          $nombre = limpiar($_POST["nombre"]);
        }
      
        if (empty($_POST["apellido1"])) {
          $emailErr = "Apellido 1 vacío";
        } else {
          $email = limpiar($_POST["apellido1"]);
        }
      
        if (empty($_POST["apellido2"])) {
          $website = "";
        } else {
          $website = limpiar($_POST["apellido2"]);
        }
      
        if (empty($_POST["fechaNac"])) {
          $comment = "";
        } else {
          $comment = limpiar($_POST["comment"]);
        }
      
        if (empty($_POST["localidad"])) {
          $genderErr = "Gender is required";
        } else {
          $gender = limpiar($_POST["gender"]);
        }
      }*/

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre= limpiar($_POST["nombre"]);
        $apellido1= limpiar($_POST["apellido1"]);
        $apellido2= limpiar($_POST["apellido2"]);
        $fechaNac= limpiar($_POST["nacimiento"]);
        $localidad= limpiar($_POST["localidad"]);
    }
    
    comprobarVariableVacia($nombre);
    comprobarVariableVacia($apellido1);
    comprobarVariableVacia($apellido2);
    comprobarVariableVacia($fechaNac);
    comprobarVariableVacia($localidad);

    crearFichero($nombre,$apellido1,$apellido2,$fechaNac,$localidad);

?>