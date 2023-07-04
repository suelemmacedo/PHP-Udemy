<?php 

function custom_autoload($nomeClasse){ 
// o curso ainda traz a função mágica "__autoload()", não mais utilizada e trocada por custom_autoload().
	var_dump($nomeClasse);
	require_once($nomeClasse . '.php');
	
}

spl_autoload_register('custom_autoload');

$carro = new DelRey();
$carro->trocarMarcha(2);


 ?>