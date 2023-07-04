<?php 

class Carro {

	private $modelo;
	private $motor;
	private $ano;

	public function getModelo(){
		return $this->modelo;
	}

	public function setModelo($modelo){
		$this->modelo = $modelo; // this->modelo é uma coisa e $modelo é outra, só se tornando iguais a partir da linha 17.


	}

	public function getMotor():float{
		return $this->motor;
	}

	public function setMotor($motor){
		$this->motor = $motor; // this->motor é uma coisa e $motor é outra, só se tornando iguais a partir da linha 17.


	}

	public function getAno():int{
		return $this->ano;
	}

	public function setAno($ano){
		$this->ano = $ano; // this->ano é uma coisa e $ano é outra, só se tornando iguais a partir da linha 17.
	}

	public function exibir(){

		return array(
			"modelo"=>$this->getModelo(),
			"motor"=>$this->getMotor(),
			"ano"=>$this->getAno()
		);
	}
}

$gol = new Carro(); //Instanciando a classe.
$gol->setModelo("Gol GT");
$gol->setMotor("1.6");
$gol->setAno("2017");

var_dump($gol->exibir());

?>