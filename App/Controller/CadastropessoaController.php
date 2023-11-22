<?php

class CadastropessoaController
{
    public function index()
    {
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('cadastro-pessoa.html');

            $parametros = array();

            $conteudo = $template->render($parametros);
            echo $conteudo;
    }

    public function insert()
    {
        try {
        Alertas::Sucesso();
        CadastroPessoa::insert($_POST);
        }
        catch (\Exception $e) {
            Alertas::Error();
            //echo $e->getMessage();
        }
    }
}


?>