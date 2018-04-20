<?php

    namespace controllers;

    use Slim\Http\Request;
    use Slim\Http\Response;
    use Psr\Container\ContainerInterface;


    class Welcome {

        private $ci;
        private $response;
        private $lang;
        private $dictionary;

        public function __construct(ContainerInterface $ci)
        {
            $this->ci = $ci;
            $this->response = $ci->get('response');

            // multilanguage
            $this->lang = $ci->get('lang');
            $this->dictionary = $ci->get('dictionary');
        }

        public function index(Request $request, Response $response)
        {
            var_dump($this->lang);
            var_dump($this->dictionary);

            $this->ci->renderer->render($response, 'welcome/hello.twig', ['dictionary' => $this->dictionary]);
            return $response;
        }


    }

