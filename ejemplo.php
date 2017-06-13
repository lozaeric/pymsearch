<?php
	
	require_once "buscador.php";
	
	$palabras_clave = ["tablet", "drone", "smartwatch", "camara anti golpes", "gps"];
	$buscador = new Buscador($palabras_clave);
	/*
	** asignando valores a los ratios
	** $buscador = new Buscador($palabras_clave, 0.5, 3);
	*/
	print_r ($buscador->obtener_palabra_clave("gps"));
	print_r ($buscador->obtener_palabra_clave("tavle"));
?>
