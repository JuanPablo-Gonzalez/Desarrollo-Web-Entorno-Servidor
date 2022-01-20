<!DOCTYPE html>
<?php
    require 'funcionesWebCompra.php';
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Alta Categorías</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nombreProducto">Nombre del producto:</label>
        <input type="text" name="nombreProducto"> <br>

        <label for="precioProducto">Precio del producto:</label>
        <input type="text" name="precioProducto"> <br>

        <label for="categoriaProducto">Categoría del producto:</label>
        <select name='categoriaProducto'>
            <?php
                mostrarCategorias();
            ?>        
        </select> <br>

        <input type="submit" value="enviar">
        <input type="reset" value="borrar">
    </form>   

    <?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombreProducto= limpiar($_POST["nombreProducto"]);
            $precioProducto= limpiar($_POST["precioProducto"]);
            $categoriaProducto= limpiar($_POST["categoriaProducto"]);

            altaProductos($nombreProducto,$precioProducto,$categoriaProducto);
        }
	?>
</body>
</html>