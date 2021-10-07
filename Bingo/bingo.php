<?php
    $arr= array();
    
	$contNumeros=0;
    while($contNumeros<15) {
		$numAleatorio= random_int(1,60);
		if(!(in_array($numAleatorio,$arr))) {
			$arr[$contNumeros]= $numAleatorio;
			$contNumeros++;
		}
    }
    
    var_dump($arr);
    
    $contApariciones= 0;
	$numerosSacados= array();
	
    while($contApariciones<15) {
      $numAleatorio= random_int(1,60);
	  if(!(in_array($numAleatorio,$numerosSacados))) {
		for($i=0;$i<count($arr);$i++) {
			if($arr[$i]==$numAleatorio) 
				$contApariciones++;
		}
	  }
	  array_push($numerosSacados,$numAleatorio);
    }
	
    if($contApariciones==15) {
        echo "ganador";
    }
	
	var_dump($numerosSacados);
	
	/* PARA VERLO MEJOR.
	$arr= array();
    
	$contNumeros=0;
    while($contNumeros<5) {
		$numAleatorio= random_int(1,10);
		if(!(in_array($numAleatorio,$arr))) {
			$arr[$contNumeros]= $numAleatorio;
			$contNumeros++;
		}
    }
    
    var_dump($arr);
    
    $contApariciones= 0;
	$numerosSacados= array();
	
    while($contApariciones<5) {
      $numAleatorio= random_int(1,10);
	  if(!(in_array($numAleatorio,$numerosSacados))) {
		for($i=0;$i<count($arr);$i++) {
			if($arr[$i]==$numAleatorio) 
				$contApariciones++;
		}
	  }
	  array_push($numerosSacados,$numAleatorio);
    }
	
    if($contApariciones==15) {
        echo "ganador";
    }
	
	var_dump($numerosSacados);
	*/
?>