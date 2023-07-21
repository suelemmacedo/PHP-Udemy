<?php

// esse código em PHP está fazendo uso de uma classe 'Usuario' para carregar e exibir informações sobre um usuário específico.

require_once("config.php");

// $sql = new Sql();

// $usuarios = $sql->select("SELECT * FROM tb_usuarios");

// echo json_encode($usuarios);


// 1) Carrega um usuário:
//$usuario = new Usuario(); // criação de uma nova instância da classe Usuario, presume-se que a classe Usuario tenha sido definida anteriormente em um arquivo separado, é esperado que essa linha invoque o construtor da classe 'Usuario', criando um novo objeto.

//$usuario->loadbyId(17);
// Presumivelmente, esse método "loadbyId" é responsável por carregar os dados do usuário com o ID especificado.

//echo $usuario;
// Essa linha imprime na saída o valor retornado pela função __toString() da classe Usuario. A função __toString() é chamada automaticamente quando um objeto é usado em um contexto de string. O retorno desse método geralmente é uma representação textual do objeto.


// 2) Carrega uma lista de usuários:

//$lista = Usuario::getList(); // os dois pontos e sem o this é devido ao método static na função.

//echo json_encode($lista);


// 3) Carrega uma lista de usuários buscando pelo login:

//$search = Usuario::search("lu");

//echo json_encode($search);

// 4) Carrega um usuário usando o login e a senha:

//$usuario = new Usuario();

//$usuario->login("root", "12356545");

//echo $usuario;

// 5) Insert de um novo usuário:

//$aluno =  new Usuario("suelem", "12345");

//$aluno->insert();

//echo $aluno;

//6) Atualizando usuário:

//$usuario = new Usuario();

//$usuario->loadById(26);

//$usuario->update("kath", "910228");

//echo $usuario;

//7) Deletando usuários:

$usuario = new Usuario();

$usuario->loadById(21);

$usuario->delete();

echo $usuario;


?>