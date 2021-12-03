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
        <label for="dni">DNI Empleado</label> 
        <?php
            echo "<select name='dni'>";
                $mysqli= crearConexion();
                $query = $mysqli -> query ("SELECT dni FROM empleado");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores[dni].'">'.$valores[dni].'</option>';
                }
            echo "</select>";
        ?>
        <br>
        <label for="departamentos">Nombre Departamento actual del empleado</label> 
        <?php
            echo "<select name='departamentos'>";
                $mysqli= crearConexion();
                $query = $mysqli -> query ("SELECT cod_dpto,nombre_dpto FROM departamento");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores[cod_dpto].'">'.$valores[nombre_dpto].'</option>';
                }
            echo "</select>";
        ?>
        <br>
        <label for="departamentos2">Nombre nuevo Departamento del empleado</label> 
        <?php
            echo "<select name='departamentos2'>";
                $mysqli= crearConexion();
                $query = $mysqli -> query ("SELECT cod_dpto,nombre_dpto FROM departamento");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores[cod_dpto].'">'.$valores[nombre_dpto].'</option>';
                }
            echo "</select>";
        ?>
        <br>

        <input type="submit" value="enviar">
        <input type="reset" value="borrar">
    </form>   

    <?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dniEmp= limpiar($_POST["dni"]);
            $codAntiguoDepart= limpiar($_POST["departamentos"]);
            $codNuevoDepart= limpiar($_POST["departamentos2"]);
            $fechaFin= date("Y-m-d H:i:s"); /*año-mes-dia hora-minutos-segundos*/
            $fechaAlta= date("Y-m-d H:i:s");

            /*Primeramente crearemos la conexión*/
            $mysqli= crearConexion();
            echo "<br>";

            if($codAntiguoDepart!=$codNuevoDepart) {
                //Hacemos el update del empleado.
                $sql = "UPDATE emple_Depart SET fecha_fin='$fechaFin' WHERE dni='$dniEmp' AND cod_dpto='$codAntiguoDepart' AND fecha_fin IS NULL";

                //Hacemos el insert en la tabla emple_depart, asignándole el nuevo departamento al empleado.
                $sql2 = "INSERT INTO emple_depart(dni,cod_dpto,fecha_ini) 
                VALUES ('$dniEmp','$codNuevoDepart','$fechaAlta')";

                if (mysqli_query($mysqli, $sql)) {
                    if (mysqli_query($mysqli, $sql2))
                        echo "El cambio de departamento se ha realizado correctamente. <br>";
                    else 
                        echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
                }
                else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                }

            } else 
                echo "No se ha podido cambiar el departamento del empleado.";

            mysqli_close($mysqli);

            /*tipo dato "fecha":
            - datetime (dd/mm/aa hh:mm:ss)
            - date (dd/mm/aa)
            - timestamp (dd/mm/aa hh:mm:ss:xxxxxxxxx nanosegundos)
            
            Si nos viene como string, debemos transformar de esto: "25/11/2021"
            a esto: "20211125", para que compare bien las fechas.*/
        }
	?>
</body>
</html>