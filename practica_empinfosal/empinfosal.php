<!DOCTYPE html>
<?php
    require 'funciones_empinfosal.php';
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Salarios de los empleados</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="departamentos">Departamentos:</label>
        <select name='departamentos'>
        <?php    
            mostrarDepartamentos();
        ?>
        </select>
        <br>

        <input type="submit" value="Ver Salario">
        <input type="reset" value="borrar">
    </form>   

    <?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombreDept= limpiar($_POST["departamentos"]);

            mostrarSalario($nombreDept);
        }
	?>
</body>
</html>