<!DOCTYPE html>
<?php
    require 'funcionesWebCompra.php';
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Consultar productos almacén</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <label for="almacen">Almacén:</label>
        <select name='almacen'>
            <?php
                mostrarAlmacenes();
            ?>        
        </select> <br>

        <input type="submit" value="enviar">
        <input type="reset" value="borrar">
    </form>   

    <?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $almacen= limpiar($_POST["almacen"]);

            consultarAlmacen($almacen);
        }
	?>
</body>
</html>