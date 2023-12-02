<?php

class ListaempiController
{
    public function index()
    {
        try{
            $todos = EmpilhadeirasTodos::selecionaTodos();    
            
            Protect::Protect();

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Lista-empi.html');

            $parametros = array();
            $parametros['empi'] = $todos;

            $conteudo = $template->render($parametros);
            echo $conteudo;
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}


?>