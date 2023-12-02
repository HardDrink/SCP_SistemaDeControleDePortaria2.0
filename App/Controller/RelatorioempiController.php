<?php

class RelatorioempiController
{
    public function index()
    {
        Protect::Protect();
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Relatorio-empi.html');

            $parametros = array();

            $conteudo = $template->render($parametros);
            echo $conteudo;
    }
}


?>