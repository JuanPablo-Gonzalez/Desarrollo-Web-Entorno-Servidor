<?php
    function convertirBinario($decimal) {
        $auxDecimal= $decimal;
        $binario= "";
        $resto;

        while($auxDecimal!=0) {
            if($auxDecimal%2==0)
                $resto= 0;
            else
                $resto= 1;

            $binario= $resto.$binario;
            $auxDecimal= ((integer)$auxDecimal/2); 
        }

        echo "<label for='decimal'>Decimal: </label>";
        echo "<input type='text' name='decimal' value='$decimal'>";
        echo "<br>";
        echo "<br>";

        echo "<label for='binario'>Binario: </label>";
        echo "<input type='text' name='binario' value='$binario'>";

        return $binario;
    }

    function convertirHexadecimal($decimal) {
        $cociente= $decimal; //la usaremos para operar.
        $base= "16";
        $resto;
        $hexadecimal= ""; //recogerá el resultado final.

        if($cociente<16) 
            $hexadecimal= "F"; //si ya es menor que 16 será F.

        while($cociente>=16) {
            $resto= $cociente%$base;
            
            if($resto==10) {
                $resto= "A";
            } else if($resto==11) {
                $resto= "B";
            } else if($resto==12) {
                $resto= "C";
            } else if($resto==13) {
                $resto= "D";
            } else if($resto==14) {
                $resto= "E";
            } else if($resto==15) 
                $resto= "F";
            
            $hexadecimal= $resto.$hexadecimal;
            
            $cociente= (int)($cociente/$base); //convertimos a entero para que no haya problema al elegir el número.
            
            //para la parte en la que coge el último cociente.
            if($cociente<16) {
                if($cociente==10) {
                    $cociente= "A";
                } else if($cociente==11) {
                    $cociente= "B";
                } else if($cociente==12) {
                    $cociente= "C";
                } else if($cociente==13) {
                    $cociente= "D";
                } else if($cociente==14) {
                    $cociente= "E";
                } else if($cociente==15) 
                    $cociente= "F";

                $hexadecimal= $cociente.$hexadecimal;
            }	
        }

        echo "<label for='decimal'>Decimal: </label>";
        echo "<input type='text' name='decimal' value='$decimal'>";
        echo "<br>";
        echo "<br>";

        echo "<label for='hexadecimal'>Hexadecimal: </label>";
        echo "<input type='text' name='hexadecimal' value='$hexadecimal'>";

        return $hexadecimal;
    }

    function convertirOctal($decimal) {
        $auxDecimal= $decimal; 
        $base= "8";
        $octal= "";
        $resto;
         
        if($base=="2") { 
             while($auxDecimal!=0) {
                 if($auxDecimal%$base==0) {
                     $resto= 0;
                 } else {
                     $resto= 1;
                 }
                 $octal= $resto.$octal;
                 $auxDecimal= ((integer)$auxDecimal/2); 
             }
         } else {
             while($auxDecimal>=$base) {
                 $resto= $auxDecimal%$base;
                 $octal= $resto.$octal;
                 $auxDecimal= ((integer)$auxDecimal/$base); 
             }
         }
         
        $octal= ((integer)$auxDecimal).$octal; 
        
        echo "<label for='decimal'>Decimal: </label>";
        echo "<input type='text' name='decimal' value='$decimal'>";
        echo "<br>";
        echo "<br>";

        echo "<label for='octal'>Octal: </label>";
        echo "<input type='text' name='octall' value='$octal'>";

        return $octal;
    }

    function todosSistemas($decimal) {
        $binario= decbin($decimal);
        $hexadecimal= dechex($decimal);
        $octal= octdec($decimal);

        echo "<label for='decimal'>Decimal: </label>";
        echo "<input type='text' name='decimal' value='$decimal'>";
        echo "<br><br>";

        echo "<table border=1>";
        echo "<tr>";
        echo  "<td>Binario</td>";
        echo "<td>$binario</td>";
        echo "</tr>";
        echo "<tr>";
        echo  "<td>Octal</td>";
        echo "<td>$octal</td>";
        echo "</tr>";
        echo "<tr>";
        echo  "<td>Hexadecimal</td>";
        echo "<td>$hexadecimal</td>";
        echo "</tr>";
        echo "</table>";
    }
?>