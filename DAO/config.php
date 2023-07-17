<?php

// Esse código define um mecanismo de autocarregamento de classes usando a função abaixo. A função 'spl_autoload_register' recebe uma função anônima como argumento, que será chamada quando uma classe for acessada, mas ainda não estiver definida. A função de autocarregamento é responsável por carregar o arquivo da classe correspondente. $class_name =  nome da classe que está sendo acessada e precisa ser carregada.

spl_autoload_register(function($class_name){

    $filename = "class".DIRECTORY_SEPARATOR.$class_name.".php";

    if (file_exists(($filename))) {
        // A função file_exists verifica se o arquivo da classe existe no caminho especificado pelo $filename. Se o arquivo existir, o fluxo de controle prossegue para a próxima linha.

        require_once($filename);
        // o require_once é uma função do PHP usada para incluir e executar o arquivo da classe especificada pelo $filename.

    }

});

// Em resumo, o código define um mecanismo de autocarregamento de classes em PHP. Sempre que uma classe for acessada, o código verificará se o arquivo correspondente existe e, em caso afirmativo, o incluirá para que a classe seja carregada e possa ser utilizada.
?>

