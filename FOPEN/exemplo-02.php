<?php 

// Esse código realiza a exportação de dados de uma tabela de usuários de um banco de dados para uma arquivo CSV (Comma-Separated Values), que é um formato de arquivo amplamente utilizado para armazenar dados tabulares.

require_once("config.php");

$sql = new Sql(); // nova instância de classe sendo criada.

$usuarios = $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");

//print_r($usuarios);

$headers = []; // Criado um array vazio para armazenar os cabeçalhos das colunas do arquivo CSV.

foreach ($usuarios[0] as $key => $value) { //Nesse loop, o código percorre os valores do primeiro registro (índice 0) do array $usuarios. Isso é feito para obter os nomes das colunas presentes nos dados. Cada nome de coluna é convertido para a primeira letra maiúscula usando ucfirst() e adicionado ao array $headers.
	array_push($headers, ucfirst($key));
}

$file = fopen("usuarios.csv", "w+");

fwrite($file, implode(",", $headers). "\r\n"); // O cabeçalho das colunas é escrito no arquivo CSV. Os nomes das colunas são convertidos em uma única string usando implode(), separados por vírgulas, e depois escritos no arquivo. O "\r\n" é usado para inserir uma quebra de linha após o cabeçalho.

foreach ($usuarios as $row) { //  Este loop percorre cada registro (linha) do array $usuarios.
	
	$data = [];

	foreach ($row as $key => $value) { //Dentro do loop anterior, este loop percorre cada coluna do registro atual. O valor de cada coluna é adicionado ao array $data.
		array_push($data, $value);
	} // End foreach de coluna

	fwrite($file, implode(",", $data) . "\r\n");
} // End foreach de linha

fclose($file);

 ?>