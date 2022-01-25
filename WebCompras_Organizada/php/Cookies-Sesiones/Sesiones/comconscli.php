<?php
    require_once 'funcionesCookiesSesiones.php';

    session_start();

    if(!isset($_SESSION["nif"]))
		header("location: comlogincli.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Consultar compras</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <label for="fechaInicio">Fecha inicio:</label>
        <input type="text" name="fechaInicio"> <br>

        <label for="fechaFin">Fecha Fin:</label>
        <input type="text" name="fechaFin"> <br>

        <input type="submit" value="enviar">
        <input type="reset" value="borrar">
        <input type="submit" value="Volver a inicio" name="inicio">
    </form>  
</body>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fechaInicio= limpiar($_POST["fechaInicio"]);
        $fechaFin= limpiar($_POST["fechaFin"]);

        if(isset($_POST["inicio"]))
                header("location: comwelcome.php");

        consultaCompras($fechaInicio,$fechaFin);
    }
?>
</html>