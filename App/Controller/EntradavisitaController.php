<?php

class EntradavisitaController
{
    public function index()
    {
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Entradavisita.html');

            $parametros = array();

            $conteudo = $template->render($parametros);
            echo $conteudo;
    }
    
    public function insert()
    {
        //var_dump($_POST);
        Entrada::insert($_POST);
    }
}


?>