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
        <label for="categoria">Categorías:</label>
        <input type="text" name="categoria">

        <input type="submit" value="enviar">
        <input type="reset" value="borrar">
    </form>   

    <?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombreCategoria= limpiar($_POST["categoria"]);

            altaCategorias($nombreCategoria);
        }
	?>
</body>
</html>