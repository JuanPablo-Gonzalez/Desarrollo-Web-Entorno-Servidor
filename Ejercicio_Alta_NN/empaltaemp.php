<!DOCTYPE html>
<?php
    require 'funciones_altaNN.php';
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Calculadora</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="dniEmp">DNI Empleado</label> 
        <input type="text" name="dniEmp"> <br>
        <label for="nombreEmp">Nombre Empleado</label> 
        <input type="text" name="nombreEmp"> <br>
        <label for="apellidoEmp">Apellidos Empleado</label> 
        <input type="text" name="apellidoEmp"> <br>
        <label for="fechaNac">Fecha nacimiento Empleado</label> 
        <input type="text" name="fechaNac"> <br>
        <label for="salario">Salario</label> 
        <input type="text" name="salario"> <br>
        <label for="departamentos">Nombre Departamento del empleado</label> 
        <?php
            echo "<select name='departamentos'>";
                $mysqli= crearConexion();
                $query = $mysqli -> query ("SELECT nombre_dpto FROM departamento");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores[nombre_dpto].'">'.$valores[nombre_dpto].'</option>';
                    
                }
            echo "</select>";
        ?>
    
        <br>

        <input type="submit" value="enviar">
        <input type="reset" value="borrar">
    </form>   

    <?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dniEmp= limpiar($_POST["dniEmp"]);
            $nombreEmp= limpiar($_POST["nombreEmp"]);
            $apellidoEmp= limpiar($_POST["apellidoEmp"]);
            $fechaNac= limpiar($_POST["fechaNac"]);
            $salario= limpiar($_POST["salario"]);
            $nombreDept= limpiar($_POST["departamentos"]);
            $fechaAlta= date("Y-m-d H:i:s");
        
            /*Primeramente crearemos las conexión*/
            $mysqli= crearConexion();
            echo "<br>";

            //Hacemos el insert del empleado.
            $sql = "INSERT INTO empleado (dni,nombre,apellidos,fecha_nac,salario) 
            VALUES ('$dniEmp','$nombreEmp','$apellidoEmp','$fechaNac','$salario')";

            if (mysqli_query($mysqli, $sql)) {
                echo "El empleado se ha insertado correctamente.";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
            }
            echo "<br>";
            
            //CONSEGUIMOS EL CÓDIGO DEL DEPARTAMENTO CON LA SIGUIENTE SELECT.
            $selectCodDpto= $mysqli->query("SELECT cod_dpto from departamento where nombre_dpto='$nombreDept'");
            $valores= mysqli_fetch_array($selectCodDpto);
            $codDpto= $valores[0];

            //Hacemos el insert en la tabla emple_depart, asignándole el departamento al empleado.
            $sql2 = "INSERT INTO emple_depart(dni,cod_dpto,fecha_ini) 
            VALUES ('$dniEmp','$codDpto','$fechaAlta')";

            if (mysqli_query($mysqli, $sql2)) {
                echo "Se han relacionado correctamente.";
            } else {
                echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
            }

            mysqli_close($mysqli);

            /*dos formas de hacer selects:
                - Orientado a objetos: $mysqli -> query(query, resultmode)
                - Procedural: mysqli_query(connection, query, resultmode)
            */
        }
	?>
</body>
</html>