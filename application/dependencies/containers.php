<?php
// DIC configuration
$container = $app->getContainer();


// multi language
$container['languagePack'] = function (\Psr\Container\ContainerInterface $c) {
    //This parameter must be is instance of TWIG Environment! /!\ (no require)
    $twigEnvironment = $c->get('renderer');
    $settings = $c->get('settings')->get('language');
    $availableLang = $settings['availableLang'];
    $defaultLang = $settings['defaultLang'];

    return new \libraries\lang\Multilanguage([
        'availableLang' => $availableLang,
        'defaultLang'   => $defaultLang,
        'twig'          => $twigEnvironment->getEnvironment(),
        'container'     => $c,
        'langFolder'    => '../application/lang/'
    ]);
};
