<?php

class LoginController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('login.html');

        $parametros = array();

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function check()
    {
        Login::check($_POST);
        
    }

    public function deslogar()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        session_destroy();
        
        header("Location: ?pagina=login");
    }
}

?>