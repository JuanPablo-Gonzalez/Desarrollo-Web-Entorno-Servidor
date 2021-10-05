<?php

/*Juan Pablo González*/

$empresas= array();

for ($i= 1; $i < 36; $i++) {
    $nombre= "empresa $i";
    $empresas[$nombre]= array(
        "precio"=>random_int(1, 999),
        "variacion"=>random_int(1, 999),
        "var."=>random_int(1, 999),
        "volumenTitulos"=>random_int(1, 999),
        "volumenEuros"=>random_int(1, 999),
    );
}

foreach($empresas as $empresa => $datos) {
    echo "<h1>$empresa</h1>";
 
    foreach($datos as $indice => $valor) {
		echo "<p> $indice:$valor </p>";
	}
}

//var_dump($empresas);
?>
