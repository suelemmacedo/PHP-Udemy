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

            $row = $results[0];

            $this->setIdusuario($row['idusuariO']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));

        }

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