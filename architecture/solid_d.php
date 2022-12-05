<?php

/**
 * ошибка в том, в конструкторе Http
 * присутствует класс более низкого уровня - XMLHttpService.
 * подозреваю, что необходимо создать интерфейс, который должен
 * реализовываться в XMLHttpService, а прокидываться в Http
 *
 * то есть избравить Http от деталей - xml или что-то другое
 *
 * можно также попробовать сделать http - абстрактным, а всю детальную реализацию
 * отдавать наследникам
 *
 */



class Http {
    private $service;

    public function __construct(XMLHttpService $xmlHttpService) { }

    public function get(string $url, array $options) {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url) {
        $this->service->request($url, 'GET');
    }
}



class XMLHttpService extends XMLHTTPRequestService {}

