<?php

$conn = new mysqli("localhost", "root", "", "dbphp7");

if ($conn->connect_error) {

    echo "Error: " . $conn->connect_error;

}

$stmt = $conn->prepare("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES(?, ?)");


$login = "user";
$password = "12345";

$login = "root";
$password = "12356545";

$stmt->bind_param("ss", $login, $password);

$stmt->execute();


 ?>
