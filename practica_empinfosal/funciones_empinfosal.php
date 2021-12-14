<?php

    function limpiar($variable) {
        $variable = trim($variable);
        $variable = stripslashes($variable);
        $variable = htmlspecialchars($variable);

        return $variable;
    }

    function crearConexionPDO() {
        $servername = "localhost";
        $username = "root";
        $password = "rootroot";
        $dbname="empleadosnn"; 

        try { /*creo con el nombre dbname aquí vale.*/
            $conn = new PDO("mysql:host=$servername;dbname=empleadosnn",$username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            echo "Conexión establecida correctamente"; 
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $conn;
    }

    function mostrarDepartamentos() {
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
    }

    function mostrarSalario($nombreDept) {
        try {
            //Establecemos la conexión.
            $conn= crearConexionPDO();
            echo "<br>";
            echo "<br>";
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Hacemos la consulta
            $querySalario = $conn->prepare("SELECT nombre, salario
            from empleado, departamento, emple_depart
            where empleado.dni=emple_depart.dni
            and departamento.cod_dpto=emple_depart.cod_dpto
            and departamento.nombre_dpto='$nombreDept'
            and fecha_fin is null
            group by empleado.nombre");
           
            // ejecutamos la consulta.
            $querySalario->execute();

            $sumaSalarios=0;

            //Recorremos el array de la consulta para mostrar los empleados,
            //y sus salarios, y a la vez hacemos la suma.
            $result = $querySalario->setFetchMode(PDO::FETCH_ASSOC);
            foreach($querySalario->fetchAll() as $row) {
                echo $row["nombre"].": ".$row["salario"]."<br>";
                $sumaSalarios+= $row["salario"];
            }

            echo "<br> Total: ".$sumaSalarios;
        }
        catch(PDOException $e) {
            echo $querySalario . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
?>