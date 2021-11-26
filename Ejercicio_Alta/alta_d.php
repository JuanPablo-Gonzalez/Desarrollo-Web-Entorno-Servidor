<?php
    /*Juan Pablo González*/
    require 'funciones_alta.php';

    echo "<h1>"."ALTA DEPARTAMENTO"."</h1>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $depart= limpiar($_POST["depart"]);
    }

    /*crearConexion();   MIRAR SI ESTO DE CREAR CONEXIÓN DEBERÍA PONERLO AQUÍ TAMBIÉN O CON PONERLO DENTRO VALE.*/
    /*altaDept($depart);*/
    altaDeptPDO($depart);
?>