<?php 

// Princípio de organização: o nome da classe dentro do arquivo é escrito da mesma forma do nome do arquivo. Isso é importante, pois o Windows não faz diferenciação de arquivos com letras maiusculas ou minusculas, ou seja, não é case sensitive. Diferente, do Linux, por exemplo.

class Cadastro{

	private $nome;
	private $email;
	private $senha;

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function __toString(){
		// Quando se faz um "json_encode" tem que ser de um array. Em resumo, o Json nada mais é que um array em que você pode ver.
		return json_encode(array(
			"nome"=>$this->getNome(),
			"email"=>$this->getEmail(),
			"senha"=>$this->getSenha(),
		));
	}


}


 ?>