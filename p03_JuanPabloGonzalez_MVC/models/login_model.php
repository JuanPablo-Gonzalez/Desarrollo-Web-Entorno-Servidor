<?php
    function login($conexion,$usuario,$clave) {
        $correcto= false;

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
    
            //Si existe entonces se crearán las variables de sesión.
            if($cuentaNif==1) {
                $_SESSION["usuario"]= $nombre." ".$apellido;
                $_SESSION["saldo"]= $saldo;
                $_SESSION["email"]= $usuario;
               
                $correcto= true;
            }

            return $correcto;
        } 
        catch(PDOException $e) {
            echo $e->getMessage(); 
        }
    }
?>