<?php

namespace App\Functions;

class Util {

	function fecha_actual() {
		date_default_timezone_set("America/Argentina/Cordoba");
		$fecha = date("d/m/Y", time());
		return $fecha;
	}

}
