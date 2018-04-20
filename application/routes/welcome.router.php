<?php

    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;

    $app->group('/', function () {

    });

    $app->group('/welcome', function () {

    });

    $app->group('/{lang:[a-z]{2}}', function () use ($container) {
        $this->get('/hello', 'controllers\Welcome:hello')->setName('hello');
    });



