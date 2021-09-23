<?php
$ip= "192.18.16.204";
$numeros= explode(".",$ip); //sirve para partir una cadena hasta el caracter especificado, y convertirla en un array.
$completo= "";
$ipBinario;

for($i=0;$i<4;$i++) {
	$ipBinario= decbin($numeros[$i]); //servirá para convertir el número de decimal a binario.
	
	while(strlen($ipBinario)<8) { //para que añada los ceros que faltan.
		$ipBinario= "0".$ipBinario;
	}
	$completo= $completo.$ipBinario."."; //concatenamos todos los resultados para formar la ip.
}

//Usé la función 'rtrim' para eliminar el último punto, que no debe estar.
echo "IP $ip en binario es: ".rtrim($completo, "."); 

//ES IGUAL QUE EL EJERCICIO 1 PERO USANDO DECBIN() EN LUGAR DE SPRINTF().
?>