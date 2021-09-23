<?php
$ip= "192.18.16.204";
$numeros= explode(".",$ip); //sirve para partir una cadena hasta el caracter especificado, y convertirla en un array.
$completo= "";
$ipBinario;

for($i=0;$i<4;$i++) {
	$ipBinario= sprintf("%b", $numeros[$i]); //servirá para convertir el número de decimal a binario.
	
	while(strlen($ipBinario)<8) { //para que añada los ceros que faltan.
		$ipBinario= "0".$ipBinario;
	}
	$completo= $completo.$ipBinario."."; //concatenamos todos los resultados para formar la ip.
}

//Usé la función 'rtrim' para eliminar el último punto, que no debe estar.
echo "IP $ip en binario es: ".rtrim($completo, "."); 

/*Me daba un error 'undefined variable', que salía por llamar a la variable '$completo' 
fuera de su ámbito de uso (el bucle for),para solucionarlo declaré la variable al principio 
y le di un valor inicial(vacío).*/
?>
