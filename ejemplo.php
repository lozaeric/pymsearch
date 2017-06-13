<?php
	
	require_once "buscador.php";
	
	$palabras_clave = ["tablet", "dron", "smartwatch", "camara anti golpes", "gps"];
	$buscador = new Buscador($palabras_clave);
	$palabra = "gps";
	print_r ($buscador->obtener_palabra_clave($palabra));

?>
