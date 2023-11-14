<?php

class HomeController
{
    public function index()
    {
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Aviso.html');

            $parametros = array();

            $conteudo = $template->render($parametros);
            echo $conteudo;
    }
}


?>