<?php

function conecta(){
	$banco = "fatec";
	$usuario = "root";
	$senha = "";
	$hostname = "localhost";

	$mysqli = new mysqli($hostname, $usuario, $senha, $banco);

return $mysqli;

}

?>