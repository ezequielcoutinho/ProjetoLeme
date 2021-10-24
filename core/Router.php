<?php

namespace core;

class Router
{
    private $controller = 'Dashboard'; //Classes -> $router[0]
    private $method = 'index';     // metodos da classe (Os metodos serão as nossas paginas)  $router[1]
    private $param = [];         // Parametros dos metodos caso o tenha.  $router[2]

    public function __construct()
    {
        $router = $this->url();

        /*
        echo "<pre>";
        print_r($router);
        */
        //Verificar se existe a Classe informada pelo usuario no navegador.

        if (file_exists('app/controllers/' . ucfirst($router[0]) . '.php')) :  //ucfirst()  : Converte a primeira letra em maiusculo. 
             //echo 'Arquivo existe';
            $this->controller = $router[0];
            unset($router[0]); //unset($router[0]); remove a chave [0]
        else :
         //echo  'Arquivo não existe';
        endif;

        $class = "\\app\\controllers\\" . ucfirst($this->controller); //Resultado \app\controllers\Site

        /*
        echo "<pre>";
        print_r($class);
        */

        $object = new $class;

        //Se existe o metodo (method)
        if (isset($router[1]) and method_exists($class, $router[1])) :
            $this->method = $router[1];
            unset($router[1]); //unset($router[1]); remove a chave [1]
        endif;

        $this->param = $router ? array_values($router) : [];

        call_user_func_array([$object, $this->method], $this->param);
    }

    private function url()
    {

        $parse_url = explode("/", filter_input(INPUT_GET, 'router', FILTER_SANITIZE_URL));
        return $parse_url;

        # a variavel "router"  armazena o caminho na url exemplo:
        # http://localhost/crud-mvc/Site/editar/45
        # no exemplo acima, o conteudo /Site/editar/45 esta armazenado na variavel "router" 
        # no qual estamos recebendo via get nesta função.
    }
}
