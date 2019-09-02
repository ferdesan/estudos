<?php

$cep = $_GET['cep'];
//$cep = $_POST['cep'];

$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);

$dados['sucesso'] = (string) $reg->resultado;
$dados['rua']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
$dados['bairro']  = (string) $reg->bairro;
$dados['cidade']  = (string) $reg->cidade;
$dados['estado']  = (string) $reg->uf;

echo json_encode($dados);


echo "<br>-----------------------------<br>";

function webClient ($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
}
//$cep = "04208000";
$url = sprintf('http://viacep.com.br/ws/%s/json/ ', $cep);
$result = json_decode(webClient($url));

var_dump($result);



echo "<br>&nbsp<br>-------------Como usar:----------------<br>";
echo $result->cep;
echo "<br>".$result->logradouro;
echo "<br>".$result->complemento;
echo "<br>".$result->bairro;
echo "<br>".$result->localidade;
echo "<br>".$result->uf;
echo "<br>Unidade:".$result->unidade;
echo "<br>Ibge:".$result->ibge;
echo "<br>".$result->gia;