<?php

class BloqueioController
{
    public function index()
    {

        try{
            $todos = bloqueioTodos::selecionaTodos();
            
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Bloqueio.html');

            $parametros = array();
            $parametros['bloqueio'] = $todos;

            $conteudo = $template->render($parametros);
            echo $conteudo;

            
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
}


?>