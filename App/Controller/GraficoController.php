<?php

class GraficoController
{
    public function index()
    {
        Protect::Protect();
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Grafico.html');

            $parametros = array();

            $conteudo = $template->render($parametros);
            echo $conteudo;
    }
}


?>