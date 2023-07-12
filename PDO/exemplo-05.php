<?php 

$conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", ""); #Conexão com o banco de dados.

$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE idusuario = :ID"); # Requesição ao BD.

$id = 10;


$stmt->bindParam(":ID", $id);

$stmt->execute();

echo "Removido ok!"

 ?>