<?php

// A classe Sql é projetada para simplificar a execução de consultas SQL e o acesso aos resultados.
// Lembrar que a classe PDO do PHP, é uma classe para trabalhar com bancos de dados relacionais.

class Sql extends PDO {

    private $conn;

    public function __construct() {
    //Aqui se estabelece uma conexão com o banco de dados. Podemos colocar todos esses parâmetros em variáveis.
        $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");
    }

    // Métodos "setParams" e "setParam" são métodos auxiliares privados que ajudam a definir os parâmetros das consultas preparadas. São usados internamente na classe para configurar os valores dos parâmetros antes da execução das consultas.

    private function setParams($statement, $parameters = array()) {

        foreach ($parameters as $key => $value) {

            $this->setParam($statement, $key, $value);
        }
    }

    private function setParam($statement, $key, $value) {

        $statement->bindParam($key, $value);
    }

    //O método "query" executa uma consulta SQL fornecida como parâmetro no formato de string. Este método retorna um objeto $stmt que contém os resultados da consulta. O parâmetro opcional "fetchMode" permite especificar um modo de recuperação dos dados, como 'PDO::Fetch_ASSOC' para retornar um array associativo. Os argumentos adicionais "fetchModeArgs" são usados para fornecer argumentos extras ao método setFetchMode do 'PDOStatement', se necessário.

    public function query(string $rawQuery, ?int $fetchMode = null, mixed ...$fetchModeArgs) {

        //$stmt = $this->conn->prepare($rawQuery);

        //$this->setParams($stmt);

        //$stmt->execute(); Os comentados feito conforme course e retorna linha.
        $stmt = $this->conn->query($rawQuery);

        return $stmt;
    }

    // O método 'select' é um método conveniente que recebe uma consulta SQL e um array de parâmetros opcionais. Ele chama o método 'query' para executar a consulta e, em seguida, usa o método fetchAll do 'PDOStatement' para retornar todos os resultados da consulta como um array associativo. 

    public function select($rawQuery, $params = array()): array {

        $stmt = $this->query($rawQuery);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
