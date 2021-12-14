<!DOCTYPE html>
<?php
    require 'funciones_empinfosal.php';
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Lista de empleados por departamento</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="departamentos">Departamentos:</label>
        <select name='departamentos'>
        <?php
            try {
                $conn= crearConexionPDO();
                $queryNombreDept= $conn->prepare("SELECT nombre_dpto FROM departamento");
                $queryNombreDept->execute();
                // set the resulting array to associative
                $result = $queryNombreDept->setFetchMode(PDO::FETCH_ASSOC);
                foreach($queryNombreDept->fetchAll() as $row) {
                    echo '<option value="'.$row["nombre_dpto"].'">'.$row["nombre_dpto"].'</option>';
                }
            } 
            catch(PDOException $e) {
                echo $queryNombreDept . "<br>" . $e->getMessage();
            }
            $conn = null;
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