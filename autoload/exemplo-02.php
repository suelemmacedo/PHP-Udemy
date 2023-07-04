<?php 

function incluirClasses($nomeClasse){

	if(file_exists($nomeClasse . ".php") === true) {
		require_once($nomeClasse . ".php");	
	}
	
}

spl_autoload_register('incluirClasses'); 
// conjunto de funções nativas do PHP que são usadas para facilitar lacunas.
spl_autoload_register(function($nomeClasse){
	if(file_exists("abstratas" . DIRECTORY_SEPARATOR . $nomeClasse . ".php") === true) {
		require_once("abstratas" . DIRECTORY_SEPARATOR . $nomeClasse . ".php");	
	}
});


$carro = new DelRey();
$carro->acelerar(80);


 ?>