<?php

// Esse autoloader abaixo é responsável por carregar automaticamente as classes conforme elas são utilizadas no código. A função 'spl_autoload_register' é chamada com um callback como argumento.Essa função registra uma função de autoload que será chamada automaticamente quando uma classe for encontrada no código e não estiver previamente definida. O callback recebe um parâmetro $class_name, que é o nome da classe que está sendo carregada. Esse nome é usado para construir o nome do arquivo que contém a definição da classe, adicionando a extensão ".php" ao final do nome da classe.
spl_autoload_register(function($class_name){

	$fileName = "class".DIRECTORY_SEPARATOR.$class_name. ".php";

	if (file_exists(($fileName))) {
		
		require_once($fileName);
	
	}

});
 
?>
