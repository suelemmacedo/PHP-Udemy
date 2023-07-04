<?php 

class  Pessoa {

	public $nome; // criando um atributo

	public function falar(){ // método -  pois, há uma função dentro de uma classe.

		return "O meu nome é".$this->nome; // Atributo fora do método, escreve normal: $nome. Só apenas dentro de um método que utilizamos o $this-> (que é uma variável interna do PHP)
	
	}
 
 }

$glaucio = new Pessoa();
$glaucio->nome = "Glaucio Daniel";
echo $glaucio->falar();

?>