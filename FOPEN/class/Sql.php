<?php

// O código abaixo cria uma classe chamada Sql escrita em PHP, a classe criada abaixo encapsula algumas operaçãoes básicas de acesso ao banco de dados usando a extensão PDO (PHP Data Objects) para interagir com o banco de dados MySQL.
class Sql
{
    private $conn;

    public function __construct()
    {
        // Estabelece a conexão com o banco de dados usando a classe PDO.
        $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");
    }

    private function setParams($statement, $parameters = [])
    {
        // este método privado é usado para vincular os valores dos parâmetros em uma instrução preparada. Ele recebe uma instrução preparada ($statement) e um array de parâmetros ($parameters), em um loop 'forEach', cada parâmetro é passado para o método 'setParam()'

        foreach ($parameters as $key => $value) {
            $this->setParam($statement, $key, $value);
        }
    }

    private function setParam($statement, $key, $value)
    {
        // esse método vincula um valor de parâmetro a uma chave de instrução preparada usando o método 'bindParam'.
        $statement->bindParam($key, $value);
    }

    public function query($rawQuery, $params = [])
    {

        // este método público recebe uma consulta SQL bruta ($rawQuery) e um array opcional de parâmetros ($params). Ele prepara a consulta usando o 'prepare()' e, em seguida, chama o método 'setParams()' para vincular os parâmetros a consulta preparada. Em seguida, a consulta é executada usando o 'execute()' e o objeto de instrução é retornado.

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
    }

    public function select($rawQuery, $params = []): array
    {
        //O método público select($rawQuery, $params = []) é uma abstração para executar uma consulta de seleção e recuperar todos os resultados. Ele chama o método query() para executar a consulta e, em seguida, usa fetchAll() com o modo de busca PDO::FETCH_ASSOC para obter todos os resultados como um array associativo.
        
        $stmt = $this->query($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
