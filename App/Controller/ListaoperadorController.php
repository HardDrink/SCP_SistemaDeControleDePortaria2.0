<?php

class ListaoperadorController
{
    public function index()
    {
        try{

            $todos = ListaOperador::selecionarTodos();

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Listaoperador.html');

            $parametros = array();
            $parametros['operador'] = $todos;

            $conteudo = $template->render($parametros);
            echo $conteudo;
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}


?>