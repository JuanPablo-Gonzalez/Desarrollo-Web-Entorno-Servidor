<!DOCTYPE html>
<?php
    require 'funcionesWebCompra.php';
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Comprar productos</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <label for="nifCliente">Ingrese su NIF:</label>
        <input type="text" name="nifCliente"> <br>

        <label for="producto">Producto:</label>
        <select name='producto'>
            <?php
                mostrarProductos();
            ?>        
        </select> <br>

        <!-- <label for="cliente">Producto:</label>
        <select name="cliente">
            <?php
                //mostrarClientes();
            ?>        
        </select> <br> -->
       
        <label for="cantidadProducto">Cantidad de producto:</label>
        <input type="text" name="cantidadProducto"> <br>

        <input type="submit" value="enviar">
        <input type="reset" value="borrar">
    </form>   

    <?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cliente= limpiar($_POST["nifCliente"]);
            $producto= limpiar($_POST["producto"]);
            $cantidadProducto= limpiar($_POST["cantidadProducto"]);

            compraProductos($cliente,$producto,$cantidadProducto);
        }
	?>
</body>
</html>