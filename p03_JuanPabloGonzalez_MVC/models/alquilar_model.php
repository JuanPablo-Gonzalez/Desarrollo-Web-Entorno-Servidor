<?php
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
        //cerrarConexion($conexion);
    }

    /*function visualizarCesta() {
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
    }*/
?>
