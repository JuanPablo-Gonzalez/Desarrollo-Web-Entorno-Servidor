<?php

    function limpiar($variable) {
        $variable = trim($variable);
        $variable = stripslashes($variable);
        $variable = htmlspecialchars($variable);

        return $variable;
    }

    function crearConexion() {
        $servername = "localhost";
        $username = "root";
        $password = "rootroot";
        $dbname="empleados1n"; 

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        /*Check connection. ESTO PODRÍA HACERLO TAMBIÉN EN
        LA FUNCIÓN DE ALTA, JUSTO DESPUÉS DE ESTABLECER LA CONEXIÓN*/
        if (!$conn)
            die("Fallo en la conexión: " . mysqli_connect_error());
        else
            echo "Conexión establecida.";

        return $conn;
    }

    /*PRUEBA CON PDO*/
    function crearConexionPDO() {
        $servername = "localhost"; /*aquí iría la ip pero no la resolvía bien, con localhost sí.*/
        $username = "root";
        $password = "rootroot";
        $dbname="empleados1n"; 

        try { /*creo con el nombre dbname aquí vale.*/
            $conn = new PDO("mysql:host=$servername;dbname=empleados1n",$username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully"; 
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }

        return $conn;
    }

    /*FUNCIONES PARA EL ALTA DEPARTAMENTO*/
    function altaDept($depart) {
        $conn = crearConexion(); /*AQUÍ MANDARÁ EL MENSAJE Y ADEMÁS LA VARIABLE SERVIRÁ PARA LUEGO COMPROBAR.*/
        
        /*Check connection. EN PRINCIPIO LO HICE ARRIBA TODO JUNTO, PERO PODRÍA
        HACERLO AQUÍ.
        if (!$conn)
            die("Fallo en la conexión: " . mysqli_connect_error());
        else
            echo "Conexión establecida.";*/

        echo "<br>";

        $sql = "INSERT INTO departamento (nombre_d) VALUES ('$depart')";

        if (mysqli_query($conn, $sql)) {
            echo "Se ha insertado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }

    function altaDeptPDO($depart) {
        //CREA LA CONEXIÓN Y COMPRUEBA DIRECTAMENTE.
        $conn = crearConexion();
        echo "<br>";

        $sql = "INSERT INTO departamento (nombre_d) VALUES ('$depart')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    
    /*FUNCIONES PARA EL ALTA EMPLEADO*/
    function altaEmp($dniEmp,$nombreEmp,$fechaNac,$nombreDept) {
        $conn = crearConexion();
        echo "<br>";

        $sql = "INSERT INTO empleado (dni,nombre_e,fec_nac,nombre_d) 
        VALUES ('$dniEmp','$nombreEmp','$fechaNac','$nombreDept')";

        if (mysqli_query($conn, $sql)) {
            echo "Se ha insertado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }

    function altaEmpleadoPDOLista($dniEmp,$nombreEmp,$fechaNac,$nombreDept) {
        $conn = crearConexion();
        echo "<br>";

        $sql = "INSERT INTO empleado (dni,nombre_e,fec_nac,nombre_d) 
        VALUES ('$dniEmp','$nombreEmp','$fechaNac','$nombreDept')";

        if ($conn->query($sql) === TRUE) {
            echo "Empleado insertado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    function mostrarSelect() {
        echo "<select name='departamentos'>";
            $mysqli= crearConexion();
            $query = $mysqli -> query ("SELECT nombre_d FROM departamento");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores[nombre_d].'">'.$valores[nombre_d].'</option>';
            }
        echo "</select>";
    }
?>
