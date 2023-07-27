<?php 
date_default_timezone_set('America/Maceio'); // configura o fuso

$file = fopen("log.txt", "a+");

fwrite($file, date("Y-m-d H:i:s") . "\r\n"); // "\r\n" significa o pular de uma linha para outra.

fclose($file);

echo "Arquivo criado com sucesso!"

 ?>