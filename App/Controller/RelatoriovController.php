<?php

class RelatoriovController
{

    public function index()
    {
        $todos = Relatorios::visitaativa($_POST);
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Relatoriosv.html');
    
            $parametros = array();
            $parametros['opa'] = $todos;
    
            $conteudo = $template->render($parametros);
            echo $conteudo;
    }
}

?>