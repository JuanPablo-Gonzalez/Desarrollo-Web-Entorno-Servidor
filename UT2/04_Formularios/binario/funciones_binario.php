<?php
    function convertir($decimal) {
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
    }
?>