<?php 

// Criação do autoload para utilização no nameSpace, toda essa criação foi vista na aula anterior de "autoload" do curso.
spl_autoload_register(function($nameClass){

	var_dump($nameClass);

	$dirClass = "class";
	$fileName = $dirClass . DIRECTORY_SEPARATOR . $nameClass . ".php";

	if(file_exists($fileName)){

		require_once($fileName);
	}
});

 ?>