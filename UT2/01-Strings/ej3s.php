<?php 
	$ip="192.168.16.100";
	$mascaraRed= 16;
	$bits= 32-$mascaraRed;
	$numeros= explode(".",$ip); //sirve para partir una cadena hasta el caracter especificado, y convertirla en un array.
	$ipBinario= "";
	$numeroBinario;
	$direccionRed;
	$direccionBroadcast;
	$primerHost;
	$segundoHost;
	
	//PASO 1: PASAR LA IP A BINARIO.
	
	for($i=0;$i<4;$i++) {
		$numeroBinario= sprintf("%b", $numeros[$i]); //servirá para convertir el número de decimal a binario.
		
		while(strlen($numeroBinario)<8) { //para que añada los ceros que faltan.
			$numeroBinario= "0".$numeroBinario;
		}
		$ipBinario= $ipBinario.$numeroBinario."."; //concatenamos todos los resultados para formar la ip.
	}

	$ipBinario= rtrim($ipBinario, ".");  //quitamos el último punto, que no debe estar.
	
	//PASO 2: CAMBIAR LOS ÚLTIMOS NÚMEROS DE LA DIRECCION IP, A 0 PARA LA DE RED Y A 1 PARA LA DE BROADCAST.
	
	//variable que uso para guardar el resultado de cambiar los ultimos digitos a 0, para poder hacer la direccion de red.
	$direccionRed= $ipBinario;
	//variable que uso para guardar el resultado de cambiar los ultimos digitos a 1, para poder hacer la direccion de broadcast.
	$direccionBroadcast= $ipBinario;
	//variable que sirve para ir contando las iteraciones que se hacen, y que no ponga más ceros de los necesarios, si no los que indican los bits obtenidos.
	$contIteraciones= $bits;
	//variable que sirve para ir seleccionando los caracteres del final de la cadena.
	$contLetrasIp= strlen($direccionRed)-1;
	
	/*LO QUE HACEMOS CON ESTE BUCLE ES CAMBIAR LOS ÚLTIMOS NUMEROS (LA CANTIDAD DEPENDE DEL NÚMERO DE BITS)
		POR CEROS EN LA DIRECCIÓN DE RED Y POR UNOS EN LA DIRECCION DE BROADCAST. HAY QUE HACERLO PARA LUEGO
			PASARLO A DECIMAL Y OBTENER LAS DIRECCIONES*/
	
	while($contIteraciones!=0) {
		if($ipBinario[$contLetrasIp]!=".") { //irá desde la última posición de la ip en binario hasta la posición marcada por los bits (el punto no cuenta, por eso si hay punto no se disminuyen las iteraciones).
			$direccionRed[$contLetrasIp]=0;
			$direccionBroadcast[$contLetrasIp]=1;
			$contIteraciones--; //con cada caracter que sea un número(no un punto) disminuirá el contador de iteraciones.
		}
		$contLetrasIp--;
	}
	
	//echo $direccionRed." ";
	//echo $direccionBroadcast." ";
	//de esta forma obtenemos el primer host, que es la siguiente dirección ip a partir de la de red.
	$primerHost= $direccionRed;
	$primerHost[strlen($primerHost)-1]=1; //sustituimos el ultimo caracter de la direccion por 1, y así sacamos la siguiente ip.
	//echo $primerHost." ";
	//de esta forma obtenemos el último host, que es la anterior dirección ip a la del broadcast.
	$ultimoHost= $direccionBroadcast;
	$ultimoHost[strlen($primerHost)-1]=0;
	//echo $ultimoHost;
	
	//PASO 3: PASAR LA IP A DECIMAL.
	$numerosRed= explode(".",$direccionRed);
	$numerosBroadcast= explode(".",$direccionBroadcast);
	$numerosPrimer= explode(".",$primerHost);
	$numerosUltimo= explode(".",$ultimoHost);
	
	$numeroDecimalRed;
	$numeroDecimalBroadcast;
	$numeroDecimalPrimer;
	$numeroDecimalUltimo;
	
	$ipRed= "";
	$ipBroadcast= "";
	$ipPrimerHost= "";
	$ipUltimoHost = "";
	
	//echo $numeroDecimalRed= bindec($numerosRed[0]);
	
	for($i=0;$i<4;$i++) {
		$numeroDecimalRed= bindec($numerosRed[$i]);
		$numeroDecimalBroadcast= bindec($numerosBroadcast[$i]);
		$numeroDecimalPrimer= bindec($numerosPrimer[$i]);
		$numeroDecimalUltimo= bindec($numerosUltimo[$i]);
		
		$ipRed= $ipRed.$numeroDecimalRed.".";
		$ipBroadcast= $ipBroadcast.$numeroDecimalBroadcast."."; 
		$ipPrimerHost= $ipPrimerHost.$numeroDecimalPrimer."."; 
		$ipUltimoHost= $ipUltimoHost.$numeroDecimalUltimo."."; 		
	}
	
	echo $ipRed= rtrim($ipRed, ".")."<br>";
	echo $ipBroadcast= rtrim($ipBroadcast, ".")."<br>";
	echo $ipPrimerHost= rtrim($ipPrimerHost, ".")."<br>";
	echo $ipUltimoHost= rtrim($ipUltimoHost, ".")."<br>";
	
	//YA FUNCIONA TODO, SOLO QUEDA PONER PRESENTABLE.
?>