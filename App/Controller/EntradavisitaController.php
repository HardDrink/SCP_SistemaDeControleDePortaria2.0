<?php

class EntradavisitaController
{
    public function index()
    {
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Entradavisita.html');

            $parametros = array();

            $conteudo = $template->render($parametros);
            echo $conteudo;
    }

    public function buscar()
    {

        try {    
            $busca = Entrada::buscar($_POST);
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Entradavisita1.html');

            $parametros = array();
            $parametros['nome'] = $busca->nome;
            $parametros['cpf'] = $busca->cpf;
            $parametros['rg'] = $busca->rg;
            $parametros['cnh'] = $busca->cnh;
            $parametros['ativo'] = $busca->ativo;
            $parametros['motivo'] = $busca->motivo;

            $conteudo = $template->render($parametros);
            echo $conteudo;
    
        }
        catch(\Exception $e)
        {
            Alertas::cpf();
        }
    }
    
    public function insert()
    {
        //var_dump($_POST);
        Entrada::insert($_POST);
    }
}


?>