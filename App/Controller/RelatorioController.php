<?php

class RelatorioController
{

    public function index()
    {

        $empi  = Relatorios::RelatorioEmpi($_POST);
        //$busca = Relatorios::selecionaTodos();

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Relatorios.html');
    
            $parametros = array();
            $parametros['empi'] = $empi;
            //$parametros['busca'] = $busca;
    
            $conteudo = $template->render($parametros);
            echo $conteudo;
    }
}

?>