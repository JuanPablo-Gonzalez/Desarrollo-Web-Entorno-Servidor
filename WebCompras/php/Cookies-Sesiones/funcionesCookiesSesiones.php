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
    //FALTA HACER LAS ACCIONES DE LAS PÁGINAS A LAS QUE SE DIRIGE.

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
                $cookie_name= "Usuario";
                $cookie_value= $nombre;
                setcookie($cookie_name,$cookie_value, time() + (86400 * 30), "/");

                $cookie_name2= "NIF";
                $cookie_value2= $row["nif"];
                setcookie($cookie_name2,$cookie_value2, time() + (86400 * 30), "/");
               
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

    /*Falta hacer lo de cookies, hacer bien lo de cerrar sesión (que rediriga bien según lo que se pulse) 
    y revisar ejercicio en general.*/
?>