## PymSearch - Buscador aproximado desarrollado en PHP
### Descripción:

El buscador fue diseñado para permitir la búsqueda aproximada dentro de un conjunto de palabras clave. Esto se realiza asignando un "puntaje" para cada palabra clave con respecto a la palabra buscada.
Este puntaje es en realidad la cantidad de caracteres en común entre ambas palabras y se calcula utilizando el algoritmo Needleman-Wunsch. Ya con todos los puntajes calculados, se elije la palabra clave con mayor similitud a la buscada.
Hay excepciones porque tenemos casos donde esta operación produce resultados inesperados. Por ejemplo, si busco una palabra breve será vinculada con otra más larga que contenga sus caracteres. 
Un ejemplo sería buscar "gps" y que exista la palabra clave "camara anti **g**ol**p**e**s**". Esto no es un comportamiento esperable. Por otro lado, tenemos otra complicación, el puntaje debe ser representativo de la palabra buscada. 
No puedo asociar la palabra "word" con "walk" si únicamente tienen un caracter en común. 

Para resolver estos dos problemas existen dos ratios: el primero relaciona el puntaje con la longitud de la palabra (por defecto es 0.75) y el segundo se refiere a la longitud de la clave y la palabra (por defecto es 2). En resumen,
para que una clave sea una respuesta valida, debe tener el 75% de los caracteres en común con la palabra buscada y su longitud debe ser de no mas del doble de caracteres que la buscada.

### Instalación: 
```php5
	require_once "buscador.php";
```	
### Instanciación: 
```php5
	$palabras_clave = ["tablet", "drone", "smartwatch", "camara anti golpes", "gps"];
	$buscador = new Buscador($palabras_clave);
```
```php5
	$palabras_clave = ["tablet", "drone", "smartwatch", "camara anti golpes", "gps"];
	$buscador = new Buscador($palabras_clave, 0.5, 3);
```
### Utilización: 
```php5
	$palabra = "gps";
	print_r ($buscador->obtener_palabra_clave($palabra));
```

