<?php

// Resumo do código abaixo: O código apresentado é uma classe chamada "Usuario" escrita em PHP. Essa classe representa um usuário e possui propriedades privadas para armazenar o id do usuário, o login, a senha e a data de cadastro. A classe também possui métodos públicos para acessar e modificar essas propriedades, além de outros métodos para carregar um usuário pelo seu id e converter o objeto em uma string no formato JSON.

class Usuario {

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario(){
        return $this->idusuario;

    }

    public function setIdusuario($value){
        $this->idusuario = $value;

    }

    public function getDeslogin(){
        return $this->deslogin;

    }

    public function setDeslogin($value){
        $this->deslogin = $value;

    }

    public function getDessenha(){
        return $this->dessenha;

    }

    public function setDessenha($value){
        $this->dessenha = $value;

    }

    public function getDtcadastro(){
        return $this->dtcadastro;

    }

    public function setDtcadastro($value){
        $this->dtcadastro = $value;

    }

    public function loadById($id){

        // esse método 'loadById' é usado para carregar os dados de um usuário do banco de dados com base em um determinado id. Ele recebe o id como parâmetro, cria uma nova instância da classe 'Sql', chama o método 'select()' dessa instância passando uma consulta SQL para obter os dados do usuário com o id correspondente. Em seguida, verifica se algum resultado foi retornado e, se sim, atualiza as propriedades do objeto 'Usuario' com os valores encontrados.

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", [

            ":ID"=>$id
        ]);

        if (count($results) > 0) {
            $this->setData($results[0]);
        }
    }

    public static function getList(){

        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
    }


    public static function search($login){
        
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", [
        ':SEARCH' => '%'.$login.'%'
        ]);
    }

    public function login($login, $password){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", [
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password,
        ]);

        if (count($results) > 0) {
            $this->setData($results[0]);

        } else {
            throw new Exception("Login ou senha inválidos.");
        }
    }

    public function setData($data){

            $this->setIdusuario($data['idusuariO']);
            $this->setDeslogin($data['deslogin']);
            $this->setDessenha($data['dessenha']);
            $this->setDtcadastro(new DateTime($data['dtcadastro']));

    }

    public function insert(){
        // 'sp_usuarios_insert' corresponde a um stored procedure (procedimento armazenado). O 'CALL' é uma instrução SQL usada para executar uma stored procedure em um banco de dados. Uma stored procedure é um conjunto de instruções SQL pré-compiladas que são armazenadas no banco de dados e podem ser chamadas e executadas posteriormente.

        $sql = new Sql(); // Criação do objeto Sql, usado para executar consultas no banco de dados. E abaixo, ela chama o método select no objeto Sql, passando uma chamada ao procedimento armazenado "sp_usuarios_insert". O procedimento recebe dois parâmetros, o login e a senha e insere uma nova linha na tabela usuarios no banco de dados.

        $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", [
            ':LOGIN'=>$this->getDeslogin(),
            ':PASSWORD'=>$this->getDessenha()
        ]);

        if(count($results) > 0) { // Verifica se a consulta retornou algum resultado. Caso positivo, o código continua.
            $this->setData($results[0]);
            // Chama o método "setData", passando o primeiro resultado da consulta para configurar os atributos da instância atual da classe com os dados retornados.
        }
    }

    public function __construct($login = "", $password = ""){

        // Esse é o construtor da classe, ele é executado automaticamente sempre que um novo objeto dessa classe é criado. Ele aceita dois parâmetros opcionais: $login e $password. O construtor chama os métodos setDeslogin e setDessenha para configurar os valores dos atributos $deslogin e $dessenha com os valores passados como argumentos.

        $this->setDeslogin($login);
        $this->setDessenha($password);

    }

    public function update($login, $password){

        // uma função de atualização de dados de um usuário em um banco de dados. Os parâmetros acima da função representam um novo login e senha do usuário que deseja-se atualizar. Os métodos abaixos são responsáveis por atualizar as propriedades $deslogin e $dessenha do objeto com os novos valores recebidos como parâmetros.

        $this->setDeslogin($login);
        $this->setDessenha($password);

        $sql = new Sql(); // Cria-se uma instância sql.

        $sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", [

            ':LOGIN'=>$this->getDeslogin(),
            ':PASSWORD'=>$this->getDessenha(),
            ':ID'=>$this->getIdusuario()

        ]);
    }

    public function delete(){

        $sql = new Sql();

        $sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", [

            ':ID'=>$this->getIdusuario()
        ]);

        $this->setidusuario(0);
        $this->setdeslogin("");
        $this->setdessenha("");
        $this->setdtcadastro( new DateTime());
    }

    public function __toString(){

        //O método __toString() é um método especial chamado quando o objeto Usuario precisa ser convertido em uma string. Nesse caso, o método retorna uma representação JSON do objeto, contendo as propriedades idusuario, deslogin, dessenha e dtcadastro. A data de cadastro é formatada usando o método format() da classe DateTime para exibi-la no formato "d/m/Y H:i:s".

        return json_encode([

            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")

        ]);

    }

}

?>