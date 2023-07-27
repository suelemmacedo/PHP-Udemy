<?php 

$dirName = "images";

if (!is_dir($dirName)){
	mkdir($dirName);
	echo "Diretório $dirName criado com sucesso!";
} else {
	rmdir($dirName);
	echo "Já existe o diretório: $dirName foi removido!";
}

 ?>
