## PymSearch - Buscador aproximado desarrollado en PHP
### Instalación: La clase Buscador se encuentra en el archivo "buscador.php", solamente es necesario incluir este archivo donde se lo requiera utilizar. 
### Instanciación: 
```php5
	require_once "buscador.php";
	
	$palabras_clave = ["tablet", "dron", "smartwatch", "camara anti golpes", "gps"];
	$buscador = new Buscador($palabras_clave);
```
```php5
	require_once "buscador.php";
	
	$palabras_clave = ["tablet", "dron", "smartwatch", "camara anti golpes", "gps"];
	$buscador = new Buscador($palabras_clave, 0.5, 3);
```
### Utilización: 
```php5
	$palabra = "gps";
	print_r ($buscador->obtener_palabra_clave($palabra));
```

