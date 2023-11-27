<?php

class ListaoperadorController
{
    public function index()
    {
        try{

            $todos = ListaOperador::selecionarTodos();

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Lista-operador.html');

            $parametros = array();
            $parametros['operador'] = $todos;

            $conteudo = $template->render($parametros);
            echo $conteudo;
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }

    }
    public function update()
    {
        try{
        CadastroOperador::update($_POST);
        Alertas::Altera();
        }
        catch(\Exception $e){
            Alertas::Error();
        }
    }
}


?>