<?php
class Cadastro_empiController
{
    public function index()
    {
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Cadastro_empi.html');

            $parametros = array();

            $conteudo = $template->render($parametros);
            echo $conteudo;
    }
}
?>