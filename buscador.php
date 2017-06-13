<?php
	class Buscador {
		public $palabras_clave, $ratio_puntaje_palabra, $ratio_clave_palabra, $INF = 100000000;
		
		public function __construct ($palabras_clave, $ratio_puntaje_palabra=0.75, $ratio_clave_palabra=2) {
			$this->palabras_clave = $palabras_clave;
			$this->ratio_puntaje_palabra = $ratio_puntaje_palabra; 
			$this->ratio_clave_palabra = $ratio_clave_palabra;
		}
		
		public function obtener_palabra_clave($palabra) {
			$mejor = ["clave"=>"", "puntaje"=>0];

			foreach ($this->palabras_clave as $clave) {
				$actual = ["clave"=>$clave,"puntaje"=>$this->longest_common_substring($palabra,$clave)];
				if ($actual["puntaje"]==strlen($palabra) && strlen($actual["clave"])==strlen($palabra))
					return $actual;
				if ($actual["puntaje"]>$mejor["puntaje"] || ($actual["puntaje"]==$mejor["puntaje"] && strlen($actual["clave"])<strlen($mejor["clave"]))) 
					$mejor = $actual;
			}
			if ($mejor["puntaje"]<=$this->ratio_puntaje_palabra*strlen($palabra) || strlen($palabra)*$this->ratio_clave_palabra<=strlen($mejor["clave"]))
				return null;
			else
				return  $mejor;
		}

		private function longest_common_substring ($palabra, $otra_palabra) { // algoritmo Needleman-Wunsch
			$array_palabra = str_split($palabra);
			$array_otra_palabra = str_split($otra_palabra);
			$fila_actual;
			$fila_ultima = new SplFixedArray(count($array_otra_palabra)+1);
			
			for ($i=1; $i<=count($array_palabra); $i++) {
				$fila_actual = new SplFixedArray(count($array_otra_palabra)+1);
				for ($j=1; $j<=count($array_otra_palabra); $j++) {
					$fila_actual[$j] = $fila_ultima[$j-1] + ($array_palabra[$i-1]==$array_otra_palabra[$j-1]? 1:-$this->INF);
					$fila_actual[$j] = max($fila_actual[$j], $fila_ultima[$j]); 
					$fila_actual[$j] = max($fila_actual[$j], $fila_actual[$j-1]); 
				}
				$fila_ultima = $fila_actual;
			}
			return $fila_actual[count($array_otra_palabra)];
		}
	}
?>
