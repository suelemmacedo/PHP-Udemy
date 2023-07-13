<?php 

$conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", ""); #Conexão com o banco de dados.

$conn->beginTransaction(); //Inicia transação!

$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE idusuario = ?"); # Requesição ao BD.

$id = 12;


$stmt->execute(array($id));

//$conn->rollback(); //Cancela se deu errado.
$conn->commit(); // Confirma se deu certo.

echo "Removido ok!"

 ?>