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

    /*Aquí había un error, porque ponía desde C-000, era porque no puse el '-' y al ponerlo se hacia mal el substr. Mejor hacerlo 
    directamente cogiendo los 3 últimos (-3). CAMBIARLO.*/
    function altaCategorias($nombreCategoria) {
        $conn= crearConexionPDO();
        echo "<br>";

        try {
            $ultimoCodigo= $conn->prepare("SELECT max(id_categoria) as ultimoCodigoCat FROM categoria");
           
            // ejecutamos la consulta.
            $ultimoCodigo->execute();

            $result = $ultimoCodigo->setFetchMode(PDO::FETCH_ASSOC);
            foreach($ultimoCodigo->fetchAll() as $row) {
                $ultimoNumero= $row["ultimoCodigoCat"]; //recogemos el resultado de la select (el max, el id_categoria mayor).
            }

            //Se convierte a número, se indica la posición para coger el número
            //y se le suma uno.
            $siguienteNumero= intval(substr($ultimoNumero,-3))+1; //cogeremos los 3 últimos números siempre.
            
            //insertamos.
            $insertCategoria= "INSERT INTO categoria (id_categoria,nombre) VALUES 
            ('C-".str_pad($siguienteNumero,3,"0",STR_PAD_LEFT)."','$nombreCategoria')";

            $conn->exec($insertCategoria);
            echo "La categoría se ha insertado correctamente.";
        }
        catch(PDOException $e) {
            echo "Error" . $e->getMessage();
        }

        $conn = null;
    }

    function mostrarCategorias() {
        $conn= crearConexionPDO();
        echo "<br>";

        try {
            $queryNombreCat= $conn->prepare("SELECT id_categoria,nombre FROM categoria");
            $queryNombreCat->execute();
            // set the resulting array to associative
            $result = $queryNombreCat->setFetchMode(PDO::FETCH_ASSOC);
            foreach($queryNombreCat->fetchAll() as $row) {
                echo '<option value="'.$row["id_categoria"].'">'.$row["nombre"].'</option>';
            }
        } 
        catch(PDOException $e) {
            echo $queryNombreCat . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    function altaProductos($nombreProducto,$precioProducto,$categoriaProducto) {
        $conn= crearConexionPDO();
        echo "<br>";

        try {
            $ultimoCodigo= $conn->prepare("SELECT max(id_producto) as ultimoCodigoProd FROM producto");
           
            // ejecutamos la consulta.
            $ultimoCodigo->execute();

            $result = $ultimoCodigo->setFetchMode(PDO::FETCH_ASSOC);
            foreach($ultimoCodigo->fetchAll() as $row) {
                $ultimoNumero= $row["ultimoCodigoProd"]; //recogemos el resultado de la select (el max).
            }

            //Se convierte a número, se indica la posición para coger el número
            //y se le suma uno.
            $siguienteNumero= intval(substr($ultimoNumero,1,4))+1;

            //insertamos.
            $insertProducto= "INSERT INTO producto (id_producto,nombre,precio,id_categoria) VALUES 
            ('P".str_pad($siguienteNumero,4,"0",STR_PAD_LEFT)."','$nombreProducto','$precioProducto','$categoriaProducto')";

            $conn->exec($insertProducto);
            echo "El producto se ha insertado correctamente.";
        }
        catch(PDOException $e) {
            echo "Error" . $e->getMessage();
        }

        $conn = null;
    }

    function altaAlmacen($localidadAlmacen) {
        $conn= crearConexionPDO();
        echo "<br>";

        try {
            $ultimoNumAlmacen= $conn->prepare("SELECT max(num_almacen) as ultimoNumAlmacen FROM almacen"); //recogerá un 0, por lo tanto el primer num_almacen será 10.
           
            // ejecutamos la consulta.
            $ultimoNumAlmacen->execute();

            $result = $ultimoNumAlmacen->setFetchMode(PDO::FETCH_ASSOC);
            foreach($ultimoNumAlmacen->fetchAll() as $row) {
                $ultimoNumero= $row["ultimoNumAlmacen"]; //recogemos el resultado de la select (el max).
            }

            //Se convierte a número, se indica la posición para coger el número
            //y se le suma uno.
            $siguienteNumero= intval($ultimoNumero)+10;

            //insertamos.
            $insertAlmacen= "INSERT INTO almacen (num_almacen,localidad) VALUES 
            ('$siguienteNumero','$localidadAlmacen')";

            $conn->exec($insertAlmacen);
            echo "El almacén se ha insertado correctamente.";
        }
        catch(PDOException $e) {
            echo "Error" . $e->getMessage();
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

    function mostrarAlmacenes() {
        $conn= crearConexionPDO();
        echo "<br>";

        try {
            $queryNumAlm= $conn->prepare("SELECT num_almacen FROM almacen");
            $queryNumAlm->execute();
            // set the resulting array to associative
            $result = $queryNumAlm->setFetchMode(PDO::FETCH_ASSOC);
            foreach($queryNumAlm->fetchAll() as $row) {
                echo '<option value="'.$row["num_almacen"].'">'.$row["num_almacen"].'</option>';
            }
        } 
        catch(PDOException $e) {
            echo $queryNumAlm . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    function aprovisionarAlmacen($producto,$almacen,$cantidadProducto) {
        $conn= crearConexionPDO();
        echo "<br>";

        try {
            $existe= false;

            $queryAlmacena= $conn->prepare("SELECT num_almacen,id_producto,cantidad FROM almacena");
            $queryAlmacena->execute();
            // set the resulting array to associative
            $result = $queryAlmacena->setFetchMode(PDO::FETCH_ASSOC);
            //Recorremos buscando si el almacen ya tiene unidades de ese producto, 
            //si tiene se pondrá existe a true y se cogerá la cantidad que tiene.
            foreach($queryAlmacena->fetchAll() as $row) {
                if($row["num_almacen"]==$almacen&&$row["id_producto"]==$producto) {
                    $nuevaCantidad= $row["cantidad"]+$cantidadProducto;
                    $existe= true;
                }
            }

            //Si existe se hará un update, sino un insert.
            if(!$existe) {
                $insertAprovisionar= "INSERT INTO almacena (num_almacen,id_producto,cantidad) VALUES 
                ('$almacen','$producto','$cantidadProducto')";
                $conn->exec($insertAprovisionar);
            }
            else {
                $updateAlmacena= "UPDATE almacena SET cantidad='$nuevaCantidad' WHERE num_almacen='$almacen' AND id_producto='$producto'";
                $conn->exec($updateAlmacena);
            }

            echo "Se han añadido $cantidadProducto unidades del producto $producto al almacén $almacen";
        } 
        catch(PDOException $e) {
            echo $insertAprovisionar . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    /*
    El control de errores hay que hacerlo creando una función de errores, a la que pasaremos el codigo que se lanza en el catch ($e o lo que sea)
    y el nombre de la función, con literal ("nombre función que produce el error"). En la función tan solo debemos indicar el número de error 
    y el nombre de la función, y luego el mensaje que se lanzará, así todos en cascada para llevar un registro. Llamaremos a la función
    en el catch para que ejecute el error.

    - ALGO ASÍ:

    catch(PDOException $e) { //PDOException recoge los errores de la base de datos.
        $e->getCode(); //recoge el código de error.

        errores($e,"altaCategorias");
    }

    function errores($e,funcion) { //con las condiciones comprobamos y controlamos todos los errores.
        if($e=="1062" && funcion=="altaCategorias") {
            echo "Hay dos categorías duplicadas.";
        } else if ($e=="1062" && funcion=="altaProductos") {
             echo "Hay dos productos duplicados.";
        }
        else if(...) {

        } else
            echo "Se ha producido el error $e"; //en caso de que no se controle algún error, se mandará directamente el código.
    } 
    */

    function consultarStock($producto) {
        $conn= crearConexionPDO();
        echo "<br>";

        try {
            $queryCantidadProducto= $conn->prepare("SELECT almacena.num_almacen,almacena.id_producto,almacena.cantidad 
            from almacen, producto, almacena 
            where almacen.num_almacen=almacena.num_almacen and
            producto.id_producto=almacena.id_producto and
            almacena.id_producto='$producto'");

            /*SELECT num_almacen,id_producto,cantidad
            from almacena
            where almacena.id_producto='P0001'*/

            $queryCantidadProducto->execute();

            // set the resulting array to associative
            $result = $queryCantidadProducto->setFetchMode(PDO::FETCH_ASSOC);
            foreach($queryCantidadProducto->fetchAll() as $row) {
                echo "Hay ".$row["cantidad"]." unidades del producto ".$row["id_producto"]." en el almacén ".$row["num_almacen"];
                echo "<br>";            
            }
        } 
        catch(PDOException $e) {
            echo $queryCantidadProducto . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    function consultarAlmacen($almacen) {
        $conn= crearConexionPDO();
        echo "<br>";

        try {
            $queryProductosAlmacen= $conn->prepare("SELECT almacena.num_almacen,producto.id_producto,
            producto.nombre,producto.precio,producto.id_categoria
            from producto, almacen, almacena 
            where producto.id_producto=almacena.id_producto and
            almacen.num_almacen=almacena.num_almacen and
            almacena.num_almacen='$almacen'");

            $queryProductosAlmacen->execute();

            // set the resulting array to associative
            $result = $queryProductosAlmacen->setFetchMode(PDO::FETCH_ASSOC);
            foreach($queryProductosAlmacen->fetchAll() as $row) {
                //echo "Información de los productos del almacén".$row["num_almacen"];
                echo "Datos del producto ".$row["id_producto"].":<br>".
                "Nombre: ".$row["nombre"].", Precio: ".$row["precio"].", Categoría: ".$row["id_categoria"];
                echo "<br><br>";
            }
        } 
        catch(PDOException $e) {
            echo $queryProductosAlmacen . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    //7
    function mostrarClientes() {
        $conn= crearConexionPDO();
        echo "<br>";

        try {
            $queryNifCliente= $conn->prepare("SELECT nif FROM cliente");
            $queryNifCliente->execute();
            // set the resulting array to associative
            $result = $queryNifCliente->setFetchMode(PDO::FETCH_ASSOC);
            foreach($queryNifCliente->fetchAll() as $row) {
                echo '<option value="'.$row["nif"].'">'.$row["nif"].'</option>';
            }
        } 
        catch(PDOException $e) {
            echo $queryNifCliente . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    function consultaCompras($cliente,$fechaInicio,$fechaFin) {
        $conn= crearConexionPDO();
        echo "<br><br>";

        try {
            $queryComprasClientes= $conn->prepare("SELECT cliente.nif,producto.id_producto,
            producto.nombre,producto.precio
            from cliente,producto,compra 
            where cliente.nif=compra.nif and
            producto.id_producto=compra.id_producto and
            cliente.nif='$cliente' and 
            fecha_compra between '$fechaInicio' and '$fechaFin'");

            //insert into compra values ("1111111A","P0002","2022-01-10","5");

            $queryComprasClientes->execute();

            echo "<b>Compras del cliente $cliente entre las fechas $fechaInicio y $fechaFin:</b><br><br>";
            // set the resulting array to associative
            $result = $queryComprasClientes->setFetchMode(PDO::FETCH_ASSOC);
            foreach($queryComprasClientes->fetchAll() as $row) {
                echo "Identificador del producto: ".$row["id_producto"].
                "<br> Nombre del producto: ".$row["nombre"].
                "<br> Precio: ".$row["precio"];
                echo "<br><br>";
            }
        } 
        catch(PDOException $e) {
            echo $queryComprasClientes . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    //8
    function altaCliente($nif,$nombre,$apellido,$cp,$direccion,$ciudad) {
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

            //SI LAS VALIDACIONES SON CORRECTAS SE INSERTARÁ
            if($correcto) {
                $insertCliente= "INSERT INTO cliente VALUES
                ('$nif','$nombre','$apellido','$cp','$direccion','$ciudad')";
            
                $conn->exec($insertCliente);

                echo "El cliente con NIF $nif se ha insertado correctamente";
            }
            else
                echo "El formato del NIF no es correcto.";
        } 
        catch(PDOException $e) {
            echo $e->getMessage(); //Incluir lo del error bien.
        }
        $conn = null;
    }

    //9
    function compraProductos($cliente,$producto,$cantidadProducto) {
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
                //podríamos hacerlo con cualquier cliente de prueba (1111111A POR EJEMPLO).
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
    }

    //En la función compraProductos() faltaría hacer que cuando un cliente
    //vuelva a comprar un producto que ya ha comprado en esa fecha, lo que pase
    //sea que se sume la  nueva cantidad comprada a las unidades.
         
    /*LDAP (Protocolo de acceso ligero). se usa para asignar permiso a los usuarios.*/
?>