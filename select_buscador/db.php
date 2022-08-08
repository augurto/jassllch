<?php
// Conexion a la base de datos para la lista de paises
function connect(){
	return new mysqli("localhost","root","root","php_paises");
}
?>