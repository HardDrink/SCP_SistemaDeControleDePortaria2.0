<?php

class Cadastro_operadorController
{
    public function index()
    {
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('cadastro-operador.html');

            $parametros = array();

            $conteudo = $template->render($parametros);
            echo $conteudo;
    }

    public function insert()
    {
        try {
        CadastroOperador::insert($_POST);
        Alertas::Sucesso();

        } catch (\Exception $e) {
            Alertas::Error();
        }
    }
}


?>