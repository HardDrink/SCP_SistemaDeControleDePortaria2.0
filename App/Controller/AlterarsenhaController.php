<?php

class AlterarsenhaController
{
    public function index()
    {
        Protect::Protect();
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('alterarsenha.html');

        $parametros = array();

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function alterar($id)
    {
        var_dump($_POST);
    }
}


?>