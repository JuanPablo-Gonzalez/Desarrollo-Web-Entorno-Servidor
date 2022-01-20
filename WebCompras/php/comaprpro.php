<!DOCTYPE html>
<?php
    require 'funcionesWebCompra.php';
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Aprovisionar Almacenes</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <label for="producto">Producto:</label>
        <select name='producto'>
            <?php
                mostrarProductos();
            ?>        
        </select> <br>

        <label for="almacen">Almacen:</label>
        <select name='almacen'>
            <?php
                mostrarAlmacenes();
            ?>        
        </select> <br>

        <label for="cantidadProducto">Cantidad de producto:</label>
        <input type="text" name="cantidadProducto"> <br>

        <input type="submit" value="enviar">
        <input type="reset" value="borrar">
    </form>   

    <?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $producto= limpiar($_POST["producto"]);
            $almacen= limpiar($_POST["almacen"]);
            $cantidadProducto= limpiar($_POST["cantidadProducto"]);

            aprovisionarAlmacen($producto,$almacen,$cantidadProducto);
        }
	?>
</body>
</html>