<!DOCTYPE html>
<?php
    require 'funcionesWebCompra.php';
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Consultar compras de un cliente</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <label for="cliente">Cliente:</label>
        <select name='cliente'>
            <?php
                mostrarClientes();
            ?>        
        </select> <br>

        <label for="fechaInicio">Fecha inicio:</label>
        <input type="text" name="fechaInicio"> <br>

        <label for="fechaFin">Fecha fin:</label>
        <input type="text" name="fechaFin"> <br>

        <input type="submit" value="enviar">
        <input type="reset" value="borrar">
    </form>   

    <?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cliente= limpiar($_POST["cliente"]);
            $fechaInicio= limpiar($_POST["fechaInicio"]);
            $fechaFin= limpiar($_POST["fechaFin"]);

            consultaCompras($cliente,$fechaInicio,$fechaFin);
        }
	?>
</body>
</html>