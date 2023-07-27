<?php 

$images = scandir("images"); // essa função tem a ideia de escanear/ver o que tem dentro do diretório.

$data = [];

foreach ($images as $img) {
	if (!in_array($img, [".", ".."])) { // esse "." e ".." só servem para navegar no diretório. Logo, o if com "!in_array..." está fazendo a exclusão dos mesmos.

		$fileName = "images" . DIRECTORY_SEPARATOR . $img;

		$info = pathinfo($fileName);

		$info["size"] = filesize($fileName); // função para verificar o tamanho do arquivo.

		$info["modified"] = date("d/m/Y H:i:s", filemtime($fileName)); // função para quando o arquivo foi modificado.

		$info["url"] = "http://localhost/DIR/".str_replace("\\", "/", $fileName); // acesso via url.

		array_push($data, $info); // O array push traz o seguinte: insere nesse array ("$data") o que está neste array ("$info").

	}
}

echo json_encode($data);
 ?>