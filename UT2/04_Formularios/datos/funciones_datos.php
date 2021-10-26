<?php

function test_input(&$variable) {
    $variable = trim($variable);
    $variable = stripslashes($variable);
    $variable = htmlspecialchars($variable);

    return $variable;
}

function comprobarCampoVacio($nombre,$apellido1,$email) {
    if (empty($nombre)) 
        echo "El campo nombre está vacío <br>"; 
    if(empty($apellido1))
        echo "El campo apellido 1 está vacío <br>"; 
    if(empty($email))
        echo "El campo email está vacío"; 
}

function devolverDatos($nombre,$apellido1,$apellido2,$email,$sexo) {
    echo "<table border=1>";
    echo "<th>Nombre</th>";
    echo "<th>Apellidos</th>";
    echo "<th>Email</th>";
    echo "<th>Sexo</th>";
    echo "<tr>";
    echo "<td>$nombre</td>";
    echo "<td>$apellido1"." "."$apellido2</td>";
    echo "<td>$email</td>";

    if($sexo=="hombre")
        echo "<td>H</td>";
    else    
        echo "<td>M</td>";

    echo "</tr>";
    echo "</table>";
}

?>