<?php 

$conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", ""); #Conexão com o banco de dados.

$conn->beginTransaction();

$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE idusuario = ?"); # Requesição ao BD.

$id = 12;


$stmt->execute(array($id));

//$conn->rollback();
$conn->commit();

echo "Removido ok!"

 ?>