<!DOCTYPE html>
<?php
    require_once 'funcionesCookiesSesiones.php';
    session_start();

    //Por ahora solo funcionará con sessions.
    if(!isset($_SESSION["nif"]))
		header("location: comlogincli.php");
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

        <label for="producto">Producto:</label>
        <select name='producto'>
            <?php
                mostrarProductos();
            ?>        
        </select> <br>
       
        <label for="cantidadProducto">Cantidad de producto:</label>
        <input type="text" name="cantidadProducto"> <br>

        <input type="submit" value="Añadir a la cesta" name="anadir">
        <input type="submit" value="Borrar cesta" name="borrar">
        <input type="submit" value="Comprar productos" name="comprar">
        <input type="submit" value="Volver a inicio" name="inicio">
    </form>   

    <?php
		if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $producto= limpiar($_POST["producto"]); //Será el código.
            $cantidadProducto= limpiar($_POST["cantidadProducto"]);
        
            if(isset($_POST["anadir"]))
                anadirProductoCesta($producto,$cantidadProducto);
            else if(isset($_POST["borrar"]))
                borrarProductos($producto,$cantidadProducto);
            else if(isset($_POST["comprar"]))
                comprarProductos($producto,$cantidadProducto);
            else if(isset($_POST["inicio"]))
                header("location: comwelcome.php");
        }
	?>
</body>
</html>