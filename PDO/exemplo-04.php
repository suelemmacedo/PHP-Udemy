<?php 

$conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", ""); #Conexão com o banco de dados.

$stmt = $conn->prepare("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID"); # Requesição ao BD.

$login = "Luna";
$password = "pepe123";
$id = 1;

$stmt->bindParam(":LOGIN", $login);
$stmt->bindParam(":PASSWORD", $password);
$stmt->bindParam(":ID", $id);

$stmt->execute();

echo "Atualizado ok!"

 ?>