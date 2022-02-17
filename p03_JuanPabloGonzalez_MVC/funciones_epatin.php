<?php
    function limpiar($variable) {
        $variable = trim($variable);
        $variable = stripslashes($variable);
        $variable = htmlspecialchars($variable);

        return $variable;
    }

    function conexion() {
        $servername = "localhost";
        $username = "root";
        $password = "rootroot";
        $dbname="epatin"; 

        try {
            $conexion= new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
            // set the PDO error mode to exception
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully"; 
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $conexion;
    }

    function cerrarConexion($conexion) {
        $conexion= null;
    }

    function login($conexion,$usuario,$clave) {
        try {
            $selectCliente= $conexion->prepare("SELECT count(dni) as 'cuentaCliente',nombre,apellido,saldo FROM eclientes 
            WHERE email= '$usuario' and dni= '$clave' and fecha_baja is null");
            $selectCliente->execute();
            // set the resulting array to associative
            $result = $selectCliente->setFetchMode(PDO::FETCH_ASSOC);
            //Se recoge la variable para saber si el nif existe.
            foreach($selectCliente->fetchAll() as $row) {
                $cuentaNif= $row["cuentaCliente"];
                $nombre= $row["nombre"];
                $apellido= $row["apellido"];
                $saldo= $row["saldo"];
            }
    
            //Si existe entonces se crearán las variables de sesión y se lleva al usuario a las otras páginas.
            if($cuentaNif==1) {
                $_SESSION["usuario"]= $nombre." ".$apellido;
                $_SESSION["saldo"]= $saldo;
                $_SESSION["email"]= $usuario;
               
                header("location: einicio.php");
            }
            else {
                echo "El usuario es incorrecto.";
            }
        } 
        catch(PDOException $e) {
            echo $e->getMessage(); //Incluir lo del error bien.
        }
    }
    
    //Borrará la cookie, solo borra el contenido, no la destruye.
    /*function cerrarSesion() {
        setcookie("usuario","",time()+3600,"/");
        header("location: login.php");
    }*/

    /*Destruirá la cookie por completo.
    function cerrarSesion() {
        unset($_SESSION["usuario"]);
        header("location: login.php");
    }*/

    function mostrarPatinetes($conexion) {
        try {
            $queryPatin= $conexion->prepare("SELECT matricula FROM epatines where disponible='S'");
            $queryPatin->execute();
            // set the resulting array to associative
            $result = $queryPatin->setFetchMode(PDO::FETCH_ASSOC);
            foreach($queryPatin->fetchAll() as $row) {
                echo '<option value="'.$row["matricula"].'">'.$row["matricula"].'</option>';
            }
        } 
        catch(PDOException $e) {
            echo $e->getMessage();
        }
        cerrarConexion($conexion);
    }

    function visualizarCesta() {
        echo "<h2>TUS PATINETES:</h2>";
        if(isset($_SESSION["cesta"])) {
            foreach($_SESSION["cesta"] as $producto) {
                echo $producto."<br>";
            }
        }
    }

    function agregarProductoCesta($patinete) {
        $conexion=conexion();
    
        if (!isset($_SESSION['cesta'])) //Si no está definida se crea con un array.
            $_SESSION['cesta']=array($patinete); //La variable producto es el código del producto.
        else {
            if(!in_array($patinete,$_SESSION["cesta"]))
                array_push($_SESSION["cesta"],$patinete);
            else
                echo "Ya has agregado ese patinete";
        }
            
        visualizarCesta();
    
        cerrarConexion($conexion);
    }

    function realizarAlquiler() {
        $conexion= conexion();

        try {
            //recorrer almacenes, si está en el almacen coger el producto de ese almacén y hacer todo.
            $fechaCompra= date("Y-m-d H:i:s");
            $cestaCompra= $_SESSION["cesta"];
            $email= $_SESSION["email"];

            $queryCantidad= $conexion->prepare("SELECT dni,saldo FROM eclientes
            where email='$email'");
            $queryCantidad->execute();
            // set the resulting array to associative
            $result = $queryCantidad->setFetchMode(PDO::FETCH_ASSOC);
            ///Si hay unidades suficientes del producto en algún almacen se pone a true.
            foreach($queryCantidad->fetchAll() as $row) {
                $dni= $row["dni"]; //para restarle las unidades.
                $saldo= $row["saldo"]; //para restarle las unidades.
            }
            
            if($saldo>=10) {
                foreach($cestaCompra as $matricula) {
                    //podríamos hacerlo con cualquier cliente de prueba (1111111A POR EJEMPLO).
                    $insertCompra= "INSERT INTO ealquileres VALUES 
                    ('$dni','$matricula','$fechaCompra',null,null)";
                    $conexion->exec($insertCompra);

                    //Se hace el update para restar las unidades al almacén correspondiente.
                    //Tal como lo tengo puesto siempre será el último almacén con disponibilidad.
                    $updateDisponible= "UPDATE epatines SET disponible='N' WHERE matricula='$matricula'";
                    $conexion->exec($updateDisponible);
                }

                echo "Se ha realizado el alquiler correctamente.";
                unset($_SESSION["cesta"]);
            }
            else {
                echo "No hay saldo suficiente";
                unset($_SESSION["cesta"]);
            }
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
        
        cerrarConexion($conexion);
    }

    function consultarAlquileres($fechaInicio,$fechaFin) {
        $conexion= conexion();
        $email= $_SESSION["email"];

        //Solo mostrará los alquileres que han sido devueltos
        try {
            $queryAlquileresClientes= $conexion->prepare("SELECT ealquileres.matricula,bateria,fecha_alquiler,fecha_devolucion,preciototal 
            from ealquileres,eclientes,epatines
            where ealquileres.dni=eclientes.dni and ealquileres.matricula=epatines.matricula 
            and email='$email' and fecha_alquiler>='$fechaInicio' and fecha_devolucion<='$fechaFin'");
            $queryAlquileresClientes->execute();

           /* SELECT ealquileres.matricula,bateria,fecha_alquiler,fecha_devolucion,preciototal
            from ealquileres,eclientes,epatines
            where ealquileres.dni=eclientes.dni and ealquileres.matricula=epatines.matricula
            and email='linda.williams@epatin.net' and fecha_alquiler>='2022-02-16 18:00:00' and fecha_devolucion<='2022-02-16 18:20:00';*/

            echo "<b>Alquileres del cliente ".$_SESSION['usuario']." entre las fechas $fechaInicio y $fechaFin:</b><br><br>";
            // set the resulting array to associative
            $result = $queryAlquileresClientes->setFetchMode(PDO::FETCH_ASSOC);
            foreach($queryAlquileresClientes->fetchAll() as $row) {
                echo "Matrícula: ".$row["matricula"].
                "<br> Batería: ".$row["bateria"].
                "<br> Fecha Alquiler: ".$row["fecha_alquiler"].
                "<br> Fecha devolución: ".$row["fecha_devolucion"].
                "<br> Precio Total: ".$row["preciototal"]."<br><br>";
            }
        } 
        catch(PDOException $e) {
            echo $e->getMessage();
        }

        cerrarConexion($conexion);
    }

    function mostrarPatinetesAlquilados() {
        $conexion= conexion();
        try {
            $email= $_SESSION["email"];
            $queryDNI= $conexion->prepare("SELECT dni FROM eclientes
            where email='$email'");
            $queryDNI->execute();
            // set the resulting array to associative
            $result = $queryDNI->setFetchMode(PDO::FETCH_ASSOC);
            ///Si hay unidades suficientes del producto en algún almacen se pone a true.
            foreach($queryDNI->fetchAll() as $row) {
                $dni= $row["dni"]; //para restarle las unidades.
            }

            $queryPatin= $conexion->prepare("SELECT matricula FROM ealquileres where dni='$dni'
            and fecha_devolucion is null");
            $queryPatin->execute();
            // set the resulting array to associative
            $result = $queryPatin->setFetchMode(PDO::FETCH_ASSOC);
            foreach($queryPatin->fetchAll() as $row) {
                echo '<option value="'.$row["matricula"].'">'.$row["matricula"].'</option>';
            }
        } 
        catch(PDOException $e) {
            echo $e->getMessage();
        }
        cerrarConexion($conexion);
    }

    function aparcarPatinete($matricula) {
        $conexion= conexion();

        try {
            //recorrer almacenes, si está en el almacen coger el producto de ese almacén y hacer todo.
            $fechaDevolver= date("Y-m-d H:i:s");
            $email= $_SESSION["email"];

            $queryCantidad= $conexion->prepare("SELECT ealquileres.dni,fecha_alquiler,preciobase FROM eclientes,ealquileres,epatines
            where ealquileres.dni=eclientes.dni and  ealquileres.matricula=epatines.matricula and email='$email' and epatines.matricula='$matricula'");
            $queryCantidad->execute();
            // set the resulting array to associative
            $result = $queryCantidad->setFetchMode(PDO::FETCH_ASSOC);
            ///Si hay unidades suficientes del producto en algún almacen se pone a true.
            foreach($queryCantidad->fetchAll() as $row) {
                $dni= $row["dni"]; //para restarle las unidades.
                $fechaAlquiler= $row["fecha_alquiler"];
                $precioBase= $row["preciobase"];
            }

            //SELECT TIMESTAMPDIFF(minute,'2022-02-16 18:04:55','2022-02-16 18:15:18') as tiempo;
            $querytiempo= $conexion->prepare("SELECT TIMESTAMPDIFF(minute,'$fechaAlquiler','$fechaDevolver') as tiempo");
            $querytiempo->execute();
            // set the resulting array to associative
            $result = $querytiempo->setFetchMode(PDO::FETCH_ASSOC);
            ///Si hay unidades suficientes del producto en algún almacen se pone a true.
            foreach($querytiempo->fetchAll() as $row) {
                $tiempo= $row["tiempo"];
            }

            //Precio base del patinete por el tiempo transcurrido entre las fechas.
            //Será el precio total del alquiler.
            $precioTotal= $precioBase*$tiempo;

            $updateTablaAlquileres= "UPDATE ealquileres 
            SET fecha_devolucion='$fechaDevolver',
            preciototal='$precioTotal'
            WHERE matricula='$matricula' and dni='$dni'";
            $conexion->exec($updateTablaAlquileres);

            $updatePatinDisponible= "UPDATE epatines SET disponible='S'
            WHERE matricula='$matricula'";
            $conexion->exec($updatePatinDisponible);

            $updateSaldoCliente= "UPDATE eclientes SET saldo=saldo+$precioTotal 
            WHERE email='$email'";
            $conexion->exec($updateSaldoCliente);

            echo "Se ha entregado correctamente";
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
        
        cerrarConexion($conexion);
    }

?>