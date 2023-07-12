<?php 

$conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", ""); #Conexão com o banco de dados.

$stmt = $conn->prepare("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES (:LOGIN, :PASSWORD)"); # Requesição ao BD.

$login = "jose";
$password = "123456789";

$stmt->bindParam(":LOGIN", $login);
$stmt->bindParam(":PASSWORD", $password);

$stmt->execute();

echo "Inserido ok!"

 ?>