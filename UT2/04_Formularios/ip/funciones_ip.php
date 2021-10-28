<?php

function limpiar($variable) {
    $variable = trim($variable);
    $variable = stripslashes($variable);
    $variable = htmlspecialchars($variable);

    return $variable;
}

function convertirBinario($ip) {
    $numeros= explode(".",$ip); 
	$ipBinario= "";
	$numeroBinario;

    for($i=0;$i<4;$i++) {
        $numeroBinario= sprintf("%b", $numeros[$i]);
        
        while(strlen($numeroBinario)<8) { 
            $numeroBinario= "0".$numeroBinario;
        }
        $ipBinario= $ipBinario.$numeroBinario.".";
    }

    $ipBinario= rtrim($ipBinario, ".");

    echo "<br>";
    echo "<label for='ipBinario'>IP binario: </label>";
    echo "<input type='text' name='ipBinario' value='$ipBinario'>";
}
?>