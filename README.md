# Um cliente de API simples em PHP para CartolaFC

<!-- [![Build Status](https://travis-ci.com/codenix-sv/coingecko-api.svg?branch=master)](https://travis-ci.com/codenix-sv/coingecko-api)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/codenix-sv/coingecko-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/codenix-sv/coingecko-api/?branch=master)
[![Test Coverage](https://api.codeclimate.com/v1/badges/650015976f280641822a/test_coverage)](https://codeclimate.com/github/codenix-sv/coingecko-api/test_coverage)
[![Maintainability](https://api.codeclimate.com/v1/badges/650015976f280641822a/maintainability)](https://codeclimate.com/github/codenix-sv/coingecko-api/maintainability)
[![License: MIT](https://img.shields.io/github/license/codenix-sv/coingecko-api)](https://github.com/codenix-sv/coingecko-api/blob/master/LICENSE) -->

![image info](./cartola-fc-logo.png)

Um cliente de API simples, escrito com PHP para [CartolaFC](https://ge.globo.com/cartola-fc/).

Cartola FC é um jogo do site da Globo criado em 2005. O game é do estilo "Footbaal Manager" e "Fantasy", nele você comanda seu próprio clube, escala os jogadores e técnicos com base no que acontece na vida real dentro de campo. Por meio de pontuações que levam o nome de 'scouts', o jogador escolhe aqueles jogadores que apresentam bom rendimento e pontos na partida, que são transferidos para o Cartola. 

O jogo do Cartola acontece durante todo o Campeonato Brasileiro, gerando pontuações para os jogadores, que podem criar e participar de ligas com os amigos. Nas graças do povo, o jogo é muito popular entre os fanáticos pelo futebol.

## Requisitos

* PHP >= 7.4
* ext-json

## Instalação

A maneira preferida de instalar este pacote é por meio do [composer](http://getcomposer.org/download/).

Rode

```bash
$ composer require humble23/cartola-fc-api
```
Ou Adicione

```json
"humble23/cartola-fc-api": "^1.0"
```
## Uso básico

### Exemplo
```php
use Humble23\CartolaFcClient\CartolaClient;

$client = new CartolaClient();
$response = $client->market()->status();
```

Para obter a última resposta (`ResponseInterface::class`) use o método `getLastResponse`:
```php
use Humble23\CartolaFcClient\CartolaClient;

$client = new CartolaClient();
$data = $client->market()->isGameOver();
$response = $client->getLastResponse();
```

## Métodos disponíveis

### Market

#### Status

Checa as informações atual do mercado

```php
$data = $client->market()->status();
```

#### IsGameOver

Verifica se a temporada atual já encerrou

```php
$data = $client->market()->IsGameOver();
```

## Licença

`humble23/cartola-fc-api` é lançado sob a licença do MIT. Veja o pacote [LICENSE](./LICENSE) para detalhes.
