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

class Programador extends Pessoa{

	public function verDados(){ //como é um método que está na mesma classe, consegue enxergar tudo que é privado, protegido e público.

		echo get_class($this) . "<br/>"; //Identifica de que classe está vindo a informação;

		echo $this->nome . "<br/>";
		echo $this->idade . "<br/>";
		echo $this->senha . "<br/>"; //O que é privado ele não herda, ou seja, não é possível ver em outra classe.
	}
}

$objeto = new Programador();

//echo $objeto->nome . "<br/>";

$objeto->verDados();

 ?>
