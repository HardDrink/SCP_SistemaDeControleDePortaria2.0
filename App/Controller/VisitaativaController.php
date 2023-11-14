<?php

class VisitaativaController
{
    public function index()
    {
        try{

            $todos = Visitaativa::selecionaAtivo();

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Visitaativa.html');

            $parametros = array();
            $parametros['ativo'] = $todos;

            $conteudo = $template->render($parametros);
            echo $conteudo;


        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}


?>