<?php 

class Pessoa{

	public $nome = "Rasmus Lerdorf";
	protected $idade = 48;
	private $senha = "123456";

	public function verDados(){ //como é um método que está na mesma classe, consegue enxergar tudo que é privado, protegido e público.
		echo $this->nome . "<br/>";
		echo $this->idade . "<br/>";
		echo $this->senha . "<br/>";
	}

}

$objeto = new Pessoa();

//echo $objeto->nome . "<br/>";

$objeto->verDados();

 ?>
