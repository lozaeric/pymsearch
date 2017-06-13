## PymSearch - Buscador aproximado desarrollado en PHP
### Instalación: 
```php5
	require_once "buscador.php";
```	
### Instanciación: 
```php5
	$palabras_clave = ["tablet", "dron", "smartwatch", "camara anti golpes", "gps"];
	$buscador = new Buscador($palabras_clave);
```
```php5
	$palabras_clave = ["tablet", "dron", "smartwatch", "camara anti golpes", "gps"];
	$buscador = new Buscador($palabras_clave, 0.5, 3);
```
### Utilización: 
```php5
	$palabra = "gps";
	print_r ($buscador->obtener_palabra_clave($palabra));
```

