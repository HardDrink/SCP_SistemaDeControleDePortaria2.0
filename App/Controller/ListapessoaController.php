<?php

class ListavisitaController
{
    public function index()
    {
        try{

                $todos = ListaPessoas::selecionaTodos();

                $loader = new \Twig\Loader\FilesystemLoader('App/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('Lista-pessoa.html');

                $parametros = array();
                $parametros['pessoas'] = $todos;

                $conteudo = $template->render($parametros);
                echo $conteudo;

            }
            catch(\Exception $e){
                echo $e->getMessage();
            }
    }
}


?>