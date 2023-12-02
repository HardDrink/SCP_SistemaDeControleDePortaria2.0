<?php

class RamalController
{
    public function index()
    {
        try{
            
            Protect::Protect();
            $todos = Ramal::selecionaTodos();
            
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Ramal.html');

            $parametros = array();
            $parametros['ramal'] = $todos;

            $conteudo = $template->render($parametros);
            echo $conteudo;
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
    }

}


?>