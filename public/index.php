<?php

    /**
     * Instantiate Slim Framework
     * Loads the setting for current environment
     */
    $config = include APP_DIR . 'config/' . APP_ENV . '.php';
    $app = new \Slim\App($config);

    /**
     * Set up dependencies
     */
    require APP_DIR . 'dependencies/containers.php';

    /*
     * this middleware will add 'lang' container with lang slug (ex: fr) and create global variable 'lang' in twig
       environment
     */
    $app->add($container['languagePack']);

    $routers = glob(APP_DIR . '/routes/*.router.php');
    foreach ($routers as $route) { include_once $route; }
    unset($route, $routers);


    /**
     * Run app
     */
    try {
        $app->run();
    } catch (\Slim\Exception\MethodNotAllowedException $e) {
        \libraries\log\LogMessage::error($e->getMessage());
    } catch (\Slim\Exception\NotFoundException $e) {
        \libraries\log\LogMessage::error($e->getMessage());
    } catch (\Exception $e) {
        \libraries\log\LogMessage::error($e->getMessage());
    }
