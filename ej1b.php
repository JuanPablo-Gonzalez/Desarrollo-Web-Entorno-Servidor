<HTML>
<H1> Ejercicio 1 de bucles </H1>
<BODY>

<?php
   $decimal= "128";
   $auxDecimal= $decimal; //la usaremos para los cálculos a realizar, para no machacar la otra.
   $binario= "";
   $resto;

   while($auxDecimal!=0) {
       if($auxDecimal%2==0) {
            $resto= 0;
       } else {
            $resto= 1;
       }
       $binario= $resto.$binario;
       $auxDecimal= ((integer)$auxDecimal/2); //Hay que hacer un cast a entero para que no de más ceros de los necesarios.
   }
   echo "El número $decimal en binario es: $binario";
?>
</BODY>
</HTML>
