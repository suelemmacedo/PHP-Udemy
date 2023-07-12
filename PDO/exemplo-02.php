<?php

//Mysql
//$conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", "");
//


//Sql Curso
//$conn = new PDO("sqlsrv:Database=dbphp7;server=localhost\SQLEXPRESS;ConnectionPooling=0", "sa", "root");
// A conexão SQL Server abaixo foi feita de forma distinta do curso.

$dsn = 'sqlsrv:Server=localhost;Database=dbphp7';
$username = 'sa';
$password = 'root';

try {
    $conn = new PDO($dsn, $username, $password);
    $stmt = $conn->prepare("SELECT * FROM tb_usuarios ORDER BY deslogin;");

	$stmt->execute();

	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}

echo json_encode($results);

?>