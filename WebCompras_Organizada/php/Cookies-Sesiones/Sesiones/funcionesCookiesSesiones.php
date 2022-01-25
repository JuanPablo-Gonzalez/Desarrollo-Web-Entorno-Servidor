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
        $dbname="comprasweb"; 

        try {
            $conn = new PDO("mysql:host=$servername;dbname=comprasweb",$username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully"; 
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $conn;
    }
    
    function registroCliente($nif,$nombre,$apellido,$cp,$direccion,$ciudad) {
        $conn= crearConexionPDO();
        echo "<br>";
        
        try {
            $correcto= true;
            $numeros= substr($nif,0,7);
            $letra= substr($nif,-1);

            //VALIDACIONES
            if(strlen($nif)==8&&$nif!="") {
                for($i=0;$i<strlen($numeros);$i++) {
                    if(!is_numeric(substr($numeros,$i,1)))
                        $correcto=false;
                }

                //ctype_alpha() para comprobar si es una letra.
                if(!ctype_alpha($letra))
                    $correcto=false;
            } else
                $correcto= false;

            //Creamos la clave
            /*ALTER TABLE cliente ADD CLAVE varchar(40);*/
            $clave= strrev($apellido);
            
            //SI LAS VALIDACIONES SON CORRECTAS SE INSERTARÁ.
            if($correcto) {
                $insertCliente= "INSERT INTO cliente VALUES
                ('$nif','$nombre','$apellido','$cp','$direccion','$ciudad','$clave')";
            
                $conn->exec($insertCliente);

                header("location: comlogincli.php");
            }
            else
                echo "El formato del NIF no es correcto.";
        } 
        catch(PDOException $e) {
            echo $e->getMessage(); //Incluir lo del error bien.
        }
        $conn = null;
    }

    function loginCliente($nombre,$clave) {
        $conn= crearConexionPDO();
        //echo "<br><br>";

        try {
            $selectCliente= $conn->prepare("SELECT count(nif) as 'cuentaCliente', nif FROM cliente WHERE NOMBRE= '$nombre' and CLAVE= '$clave'");
            $selectCliente->execute();
            // set the resulting array to associative
            $result = $selectCliente->setFetchMode(PDO::FETCH_ASSOC);
            //Se recoge la variable para saber si el nif existe.
            foreach($selectCliente->fetchAll() as $row) {
                $cuentaNif= $row["cuentaCliente"];
            }
    
            //Si existe entonces se crearán las variables de sesión y se lleva al usuario a las otras páginas.
            if($cuentaNif==1) {
                session_start(); //Iniciamos la sesión una vez las validaciones son correctas.

                $_SESSION['nombre'] = $nombre;
                $_SESSION['nif'] = $row["nif"];

                header("location: comwelcome.php"); //NOS LLEVARÁ A LA PÁGINA DE COMPRAS.
            }
            else {
                echo "<b>El usuario es incorrecto.</b>";
            }
        } 
        catch(PDOException $e) {
            echo $e->getMessage(); //Incluir lo del error bien.
        }
        $conn = null;
    }

    function loginClienteCookies($nombre,$clave) {
        $conn= crearConexionPDO();
        echo "<br><br>";

        try {
            $selectCliente= $conn->prepare("SELECT count(nif) as 'cuentaCliente', nif FROM cliente WHERE NOMBRE= '$nombre' and CLAVE= '$clave'");
            $selectCliente->execute();
            // set the resulting array to associative
            $result = $selectCliente->setFetchMode(PDO::FETCH_ASSOC);
            //Se recoge la variable para saber si el nif existe.
            foreach($selectCliente->fetchAll() as $row) {
                $cuentaNif= $row["cuentaCliente"];
            }
    
            //Si existe entonces se crearán las variables de sesión y se lleva al usuario a las otras páginas.
            if($cuentaNif==1) {
                $cookie_name= "nombre";
                $cookie_value= $nombre;
                setcookie($cookie_name,$cookie_value,time()+3600,"/");

                $cookie_name= "nif";
                $cookie_value= $row["nif"];
                setcookie($cookie_name,$cookie_value,time()+3600,"/");
               
                header("location: comwelcomeCookies.php"); //NOS LLEVARÁ A LA PÁGINA DE BIENVENIDA.
            }
            else {
                echo "El usuario es incorrecto.";
            }
        } 
        catch(PDOException $e) {
            echo $e->getMessage(); //Incluir lo del error bien.
        }
        $conn = null;
    }

    //Para mostrar los productos en el desplegable de compras.
    function mostrarProductos() {
        $conn= crearConexionPDO();
        echo "<br>";

        try {
            $queryNombreProd= $conn->prepare("SELECT id_producto,nombre FROM producto");
            $queryNombreProd->execute();
            // set the resulting array to associative
            $result = $queryNombreProd->setFetchMode(PDO::FETCH_ASSOC);
            foreach($queryNombreProd->fetchAll() as $row) {
                echo '<option value="'.$row["id_producto"].'">'.$row["nombre"].'</option>';
            }
        } 
        catch(PDOException $e) {
            echo $queryNombreProd . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    /*Se usa en función anadirProductoCesta() para enseñar el nombre del producto.
    La usaremos siempre que queramos mostrar el nombre del producto al cliente*/
    function obtenerNombreProducto($producto) {
        $conn=crearConexionPDO();

        try {
            $selectNombreProd= $conn->prepare("SELECT nombre from producto where
            id_producto='$producto'");
            $selectNombreProd->execute();
            // set the resulting array to associative
            $result = $selectNombreProd->setFetchMode(PDO::FETCH_ASSOC);
            foreach($selectNombreProd->fetchAll() as $row) {
                $nombreProducto= $row["nombre"];
            }
        }
        catch(PDOException $e) {
            echo $insertCompra . "<br>" . $e->getMessage();
        }

        return $nombreProducto;
    }

    /*En esta función meteremos los producto seleccionados a la cesta de la compra. Primero
    comprobaremos si existe o no y añadiremos a un array(matriz de arrays indexados) con los productos.
    Mostraremos un listado con los productos de la cesta según se vayan añadiendo.*/
    function anadirProductoCesta($producto,$cantidadProducto) {
        if($cantidadProducto!="") {
            if (!isset($_SESSION['cesta'])) //Si no está definida se crea con un array.
                $_SESSION['cesta']=array(array($producto,$cantidadProducto)); //La variable producto es el código del producto.
            else
                array_push($_SESSION['cesta'],array($producto,$cantidadProducto)); 
            
            //var_dump($_SESSION['cesta']);
            
            //Recorremos el array cesta para mostrar los productos que se van añadiendo.
            echo("<h2>Tu cesta de la compra:</h2>");
            foreach($_SESSION["cesta"] as $productos=> $producto) {
                $idProducto= $producto[0];
                $cantidadProducto= $producto[1];

                echo("Nombre del producto: ".obtenerNombreProducto($idProducto).", Cantidad: $cantidadProducto <br>");
            }
        } else
            echo("<br>Debes añadir una cantidad correcta.");
    }

    function borrarProductos() { //Borramos los productos de la cesta.
        unset($_SESSION['cesta']);
    }

    /*Con esta versión de compra de productos se comprueba si hay un pedido de ese producto en ese día,
    y si lo hay se hace un update de la cantidad pedida de ese producto en la tabla compra.*/
    function comprarProductos() {
        $conn= crearConexionPDO();
        echo "<br>";

        try {
            $cestaCompra= $_SESSION["cesta"];
            $hayUnidades= false;
            $fechaCompra= date("Y-m-d");
            $cliente= $_SESSION["nif"];
            
            //$producto[0] será el código del producto, mientras que $producto[1] será la cantidad.
            foreach($cestaCompra as $productos=> $producto) {
                $idProducto= $producto[0];
                $cantidadProducto= $producto[1]; 
                
                /*Comprobamos si hay unidades en algún almacén.*/
                $queryCantidad= $conn->prepare("SELECT num_almacen,cantidad FROM almacena
                where id_producto='$idProducto'");
                $queryCantidad->execute();
                // set the resulting array to associative
                $result = $queryCantidad->setFetchMode(PDO::FETCH_ASSOC);
                //Si hay unidades suficientes del producto en algún almacen se pone a true.
                foreach($queryCantidad->fetchAll() as $row) {
                    if($row["cantidad"]>=$cantidadProducto) {
                        $hayUnidades= true;
                        $cantidadActual= $row["cantidad"]; //para restarle las unidades.
                        $almacenProducto= $row["num_almacen"]; //para restarle las unidades.
                    }
                }

                /*Si hay unidades comprobamos si ya había pedido de ese producto en ese día o si no.*/
                if($hayUnidades) {
                    /*Recogemos el count(nif) para saber si ya había comprado antes, y el número de 
                    Unidades para sumarle las nuevas luego.*/
                    $queryNif= $conn->prepare("SELECT count(nif) as cuentaNif,unidades FROM compra
                    where nif='$cliente' and id_producto='$idProducto' and fecha_compra='$fechaCompra'");
                    $queryNif->execute();
                    // set the resulting array to associative
                    $result = $queryNif->setFetchMode(PDO::FETCH_ASSOC);
                    foreach($queryNif->fetchAll() as $row) {
                        $cuentaNif= $row["cuentaNif"];
                        $cantidadComprada= $row["unidades"];
                    }
                    //Si ya había comprado ese producto ese mismo día entonces se hace un update del número de unidades. 
                    if($cuentaNif==1) { 
                        $anadirCantidad= $cantidadComprada+$cantidadProducto;
                        $updateProductoComprado= "UPDATE compra SET unidades='$anadirCantidad' WHERE nif='$cliente' 
                        AND id_producto='$idProducto' and fecha_compra='$fechaCompra'";
                        $conn->exec($updateProductoComprado);
                    } else {
                        $insertCompra= "INSERT INTO compra VALUES 
                        ('$cliente','$idProducto','$fechaCompra','$cantidadProducto')";
                        $conn->exec($insertCompra);
                    }
                    
                    echo "La compra del producto ".obtenerNombreProducto($idProducto)." se ha realizado correctamente. <br>";
    
                    //Se hace el update para restar las unidades al almacén correspondiente.
                    //Tal como lo tengo puesto siempre será el último almacén con disponibilidad.
                    $nuevaCantidad= $cantidadActual-$cantidadProducto;
                    $updateAlmacena= "UPDATE almacena SET cantidad='$nuevaCantidad' WHERE num_almacen='$almacenProducto' 
                    AND id_producto='$idProducto'";
                    $conn->exec($updateAlmacena);
                }
                else 
                    echo "No hay unidades suficientes del producto ".obtenerNombreProducto($idProducto).".";

                unset($_SESSION["cesta"]); //Se vacía la cesta tras comprar los productos.
            }
        } 
        catch(PDOException $e) {
            echo $insertCompra . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    
    function consultaCompras($fechaInicio,$fechaFin) {
        $conn= crearConexionPDO();
        echo "<br><br>";

        try {
            $cliente= $_SESSION["nif"];
            $cuentaCompras= 0;

            $queryComprasClientes= $conn->prepare("SELECT producto.id_producto,
            producto.nombre,producto.precio,compra.fecha_compra,compra.unidades
            from cliente,producto,compra 
            where cliente.nif=compra.nif and
            producto.id_producto=compra.id_producto and
            cliente.nif='$cliente' and 
            fecha_compra between '$fechaInicio' and '$fechaFin'");

            $queryComprasClientes->execute();

            echo "<b>Compras del cliente $cliente entre las fechas $fechaInicio y $fechaFin:</b><br><br>";
            // set the resulting array to associative
            $result = $queryComprasClientes->setFetchMode(PDO::FETCH_ASSOC);
            foreach($queryComprasClientes->fetchAll() as $row) { //Con el bucle vamos mostrando los productos.
                echo "Identificador del producto: ".$row["id_producto"].
                "<br> Nombre del producto: ".$row["nombre"].
                "<br> Precio: ".$row["precio"].
                "<br> Fecha compra: ".$row["fecha_compra"].
                "<br> Unidades compradas: ".$row["unidades"];
                echo "<br><br>";
                $cuentaCompras+=1;
            }

            if($cuentaCompras==0) //Si hay 0 iteraciones en el array significa que no hay compras.
                echo("No hay compras realizadas entre esas dos fechas.");
        } 
        catch(PDOException $e) {
            echo $queryComprasClientes."<br>".$e->getMessage();
        }
        $conn = null;
    }

    /*
    function comprarProductos() {
        //SE HACE TODO EL PROCESO DE INSERT, UPDATE, BUSCAR ALMACÉN...
        $conn= crearConexionPDO();
        echo "<br>";

        try {
            $cestaCompra= $_SESSION["cesta"];
            
            //$producto[0] será el código del producto, mientras que $producto[1] será la cantidad.
            foreach($cestaCompra as $productos=> $producto) {
                $idProducto= $producto[0];
                $cantidadProducto= $producto[1];
                $hayUnidades= false;
                $fechaCompra= date("Y-m-d H:i:s");
    
                $queryCantidad= $conn->prepare("SELECT num_almacen,cantidad FROM almacena
                where id_producto='$idProducto'");
                $queryCantidad->execute();
                // set the resulting array to associative
                $result = $queryCantidad->setFetchMode(PDO::FETCH_ASSOC);
                //Si hay unidades suficientes del producto en algún almacen se pone a true.
                foreach($queryCantidad->fetchAll() as $row) {
                    if($row["cantidad"]>=$cantidadProducto) {
                        $hayUnidades= true;
                        $cantidadActual= $row["cantidad"]; //para restarle las unidades.
                        $almacenProducto= $row["num_almacen"]; //para restarle las unidades.
                    }
                }
                
                if($hayUnidades) {
                    $cliente= $_SESSION["nif"]; 
                    $insertCompra= "INSERT INTO compra VALUES 
                    ('$cliente','$idProducto','$fechaCompra','$cantidadProducto')";
                    $conn->exec($insertCompra);
                    echo "La compra del producto $idProducto se ha realizado correctamente. <br>";
    
                    //Se hace el update para restar las unidades al almacén correspondiente.
                    //Tal como lo tengo puesto siempre será el último almacén con disponibilidad.
                    $nuevaCantidad= $cantidadActual-$cantidadProducto;
                    $updateAlmacena= "UPDATE almacena SET cantidad='$nuevaCantidad' WHERE num_almacen='$almacenProducto' 
                    AND id_producto='$idProducto'";
                    $conn->exec($updateAlmacena);
                }
                else 
                    echo "No hay unidades suficientes del producto $idProducto. <br>";
            }
        } 
        catch(PDOException $e) {
            echo $insertCompra . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    /*
    Para meter arrays en las cookies> serialize-unsearilize o json_encode y json_decode (mejor con json).
    Para meter arrays en las sessions>  
    */ 
?>