<?php

    $app->group('/', function () {

    });

    $app->group('/welcome', function () {

    });

    $app->group('/{lang:[a-z]{2}}', function () use ($container) {
        $this->get('/hello', 'controllers\Welcome:hello')->setName('hello');
    });



