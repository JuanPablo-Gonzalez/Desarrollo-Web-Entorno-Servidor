
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
        <label for="apellidoEmp">Apellido Empleado</label> 
        <input type="text" name="apellidoEmp"> <br>
        <label for="salario">Salario</label> 
        <input type="text" name="salario"> <br>
        <label for="fechaNac">Fecha nacimiento Empleado</label> 
        <input type="text" name="fechaNac"> <br>
        <label for="departamentos">Nombre Departamento del empleado</label> 
        <?php
           mostrarSelect();
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
            $salario= limpiar($_POST["salario"]);
            $fechaNac= limpiar($_POST["fechaNac"]);
            $nombreDept= limpiar($_POST["departamentos"]);
            $nombreDept= strtoupper($nombreDept);
    
            //var_dump($_POST);
            altaEmpleadoPDOLista($dniEmp,$nombreEmp,$fechaNac,$nombreDept);
        }
	?>
</body>
</html>


