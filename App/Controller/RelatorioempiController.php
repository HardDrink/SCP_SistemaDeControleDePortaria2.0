<?php

class RelatorioempiController
{
    public function index()
    {
        Protect::Protect();
            $empi = Relatorios::selecionaTodos();
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Relatorio-empi.html');

            $parametros = array();
            $parametros['empi'] = $empi;

            $conteudo = $template->render($parametros);
            echo $conteudo;
    }

}


?>