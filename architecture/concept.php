<?php

/**
 * создать класс Vault, через него получать токен
 * в классе - обращение к различным местам хранения, в зависимости от конфига
 * в конфиге хранить в многомерном массиве систему хранения и др. параметры
 * ключ - тип хранения, значение - параметр запроса
 *
 * разные паттерны можно использовать, например, фасад - обращек в vault - дай токен,
 * методы подключения спрятаны
 *
 * PS - час времени нашел, все задания сделать не успел
 */

class Concept {
    private $client;

    public function __construct() {
        $this->client = new \GuzzleHttp\Client();
    }

    public function getUserData() {
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $this->getSecretKey()
        ];

        $request = new \Request('GET', 'https://api.method', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
        });

        $promise->wait();
    }

    public function getSecretKey() {
        // toDo
    }
}