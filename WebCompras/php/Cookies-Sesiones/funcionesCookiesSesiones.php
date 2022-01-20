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
            echo "Connected successfully"; 
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
                $_SESSION['nombre'] = $nombre;
                $_SESSION['nif'] = $row["nif"];

                header("location: comwelcome.php"); //NOS LLEVARÁ A LA PÁGINA DE COMPRAS.
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

    function anadirProductoCesta($producto,$cantidadProducto) { //proceso de añadir productos a la cesta.
        $conn= crearConexionPDO();
        echo "<br>";

        //AGREGAR A LA CESTA DE LA COMPRA
        if (!isset($_SESSION['cesta'])) 
            $_SESSION['cesta']=array(array($producto,$cantidadProducto)); //Aquí guardando el codigo del producto mejor.
        else 
            array_push($_SESSION['cesta'],array($producto,$cantidadProducto));
        
        var_dump($_SESSION['cesta']);
    
        $conn = null;
    }

    function borrarProductos() { //proceso de añadir productos a la cesta.
        unset($_SESSION['cesta']);
    }

    function comprarProductos($producto,$cantidadProducto) {
        //SE HACE TODO EL PROCESO DE INSERT, UPDATE, BUSCAR ALMACÉN...
       echo("Compra hecha");
    }

    /*Función completa hecha antes.
    function anadirProductoCesta($producto,$cantidadProducto) {
        $conn= crearConexionPDO();
        echo "<br>";

        try {
            //recorrer almacenes, si está en el almacen coger el producto de ese almacén y hacer todo.
            $hayUnidades= false;
            $fechaCompra= date("Y-m-d H:i:s");

            $queryCantidad= $conn->prepare("SELECT num_almacen,cantidad FROM almacena
            where id_producto='$producto'");
            $queryCantidad->execute();
            // set the resulting array to associative
            $result = $queryCantidad->setFetchMode(PDO::FETCH_ASSOC);
            ///Si hay unidades suficientes del producto en algún almacen se pone a true.
            foreach($queryCantidad->fetchAll() as $row) {
                if($row["cantidad"]>=$cantidadProducto) {
                    $hayUnidades= true;
                    $cantidadActual= $row["cantidad"]; //para restarle las unidades.
                    $almacenProducto= $row["num_almacen"]; //para restarle las unidades.
                }
            }
            
            if($hayUnidades) {
                $cliente= $_SESSION["nombre"];
                $insertCompra= "INSERT INTO compra VALUES 
                ('$cliente','$producto','$fechaCompra','$cantidadProducto')";
                $conn->exec($insertCompra);
                echo "Se ha realizado la compra correctamente.";

                //Se hace el update para restar las unidades al almacén correspondiente.
                //Tal como lo tengo puesto siempre será el último almacén con disponibilidad.
                $nuevaCantidad= $cantidadActual-$cantidadProducto;
                $updateAlmacena= "UPDATE almacena SET cantidad='$nuevaCantidad' WHERE num_almacen='$almacenProducto' 
                AND id_producto='$producto'";
                $conn->exec($updateAlmacena);
            }
            else {
                echo "No hay unidades del producto seleccionado.";
            }
        } 
        catch(PDOException $e) {
            echo $insertCompra . "<br>" . $e->getMessage();
        }
        $conn = null;
    }*/

    /*
    Para meter arrays en las cookies> serialize-unsearilize o json_encode y json_decode (mejor con json).
    Para meter arrays en las sessions>  
    */ 
?>