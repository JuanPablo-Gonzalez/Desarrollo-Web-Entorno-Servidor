<?php
    function convertirBase($numero,$baseNueva) {
        $resultado= "";

        $numeroPartido= explode("/",$numero);
        $numero= $numeroPartido[0];
        $baseAntigua= $numeroPartido[1];
            
        /*if($base=="2")  //si la base es 2, habrá que convertirlo a binario.
            $resultado= decbin($numero);
        else if ($base=="16")
            $resultado= dechex($numero);
        else if($base=="8") 
              $resultado= octdec($numero);
        else*/

        $resultado= base_convert($numero, $baseAntigua, $baseNueva);
        
            
        //$resultado= ((integer)$auxnumero).$resultado; //le hago un cast al mostrarlo porque en algunos casos dará numero el cociente, y no valdrá.
        
        echo "El número $numero en base $baseNueva es: $resultado<br>";
    }

?>