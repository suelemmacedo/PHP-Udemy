<?php

class Documento {

    private $numero; // private - só pode ser acessada dentro da própria classe.

    public function getNumero(){

        return $this->numero;

    }

    public function setNumero($numero){
        // método para validar documento, aqui é verificado se o número do cpf é valido. Se o número do cpf for inválido, uma exceção é lançada com uma mensagem de erro.
        $resultado = Documento::validarCPF($numero);

        if ($resultado === false) {

            throw new Exception("CPF informado não é válido.", 1);

        }

        $this->numero = $numero;

    }

    public static function validarCPF($cpf):bool{ 
    // método para validar cpf

        if(empty($cpf)) {
            return false;
        }
     
        $cpf = preg_match('/[0-9]/', $cpf)?$cpf:0;
    
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
         
        
        if (strlen($cpf) != 11) {
            echo "length";
            return false;
        }
        
        else if ($cpf == '00000000000' || 
            $cpf == '11111111111' || 
            $cpf == '22222222222' || 
            $cpf == '33333333333' || 
            $cpf == '44444444444' || 
            $cpf == '55555555555' || 
            $cpf == '66666666666' || 
            $cpf == '77777777777' || 
            $cpf == '88888888888' || 
            $cpf == '99999999999') {
            return false;
    
         } else {   
             
            for ($t = 9; $t < 11; $t++) {
                 
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    return false;
                }
            }
     
            return true;
        }

    }

}

//Duas formas

//Primeira
// Abaixo uma instância(objeto) é criada.
$cpf = new Documento();
$cpf->setNumero("07696864432");

var_dump($cpf->getNumero());



//Segunda
//var_dump(Documento::validarCPF("87867147241"));

?>
