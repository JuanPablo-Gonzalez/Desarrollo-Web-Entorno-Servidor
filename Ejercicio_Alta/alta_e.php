<?php
    /*Juan Pablo González*/
    /*ESTO HECHO EN UN FORMULARIO A PARTE, PERO PODRÍA HACERSE JUNTO CON EL OTRO.*/
    require 'funciones_alta.php';

    echo "<h1>"."ALTA EMPLEADO"."</h1>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dniEmp= limpiar($_POST["dniEmp"]);
        $nombreEmp= limpiar($_POST["nombreEmp"]);
        $fechaNac= limpiar($_POST["fechaNac"]);
        $nombreDept= limpiar($_POST["nombreDept"]);
    }

    altaEmp($dniEmp,$nombreEmp,$fechaNac,$nombreDept);
?>