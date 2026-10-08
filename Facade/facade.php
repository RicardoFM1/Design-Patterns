<?php

use GuzzleHttp\Client;

// Instancia o cliente do Guzzle (Biblioteca usada para buscar APIs e links externos para o php)

$client = new Client();

// Busca a API.
$res = $client->request('GET', 'https://api.clima.com/chuva');

// Aparece na tela o status dessa requisição.
echo $res->getStatusCode();

// Aparece na tela o corpo dessa requisição, como por exemplo quantos milimetros vai chover em um sábado qualquer, onde as 
// pessoas costumam ir no shopping
echo $res->getBody();
