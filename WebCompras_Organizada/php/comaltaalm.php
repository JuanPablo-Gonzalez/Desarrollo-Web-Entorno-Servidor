<!DOCTYPE html>
<?php
    require 'funcionesWebCompra.php';
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Alta Almacén</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="localidad">Localidad:</label>
        <input type="text" name="localidad">

        <input type="submit" value="enviar">
        <input type="reset" value="borrar">
    </form>   

    <?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $localidadAlmacen= limpiar($_POST["localidad"]);

            altaAlmacen($localidadAlmacen);
        }

        /*Para ver las filas no usar un array, usar count, y para lo de almacenes de 10 en 10
        hacer así> select max(numAlmacen)+10, para que siempre siga el orden correcto.*/
	?>
</body>
</html>