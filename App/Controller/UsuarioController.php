<?php

class UsuarioController
{

    public function index()
    {

        $usu = Usuarios::buscartodos();
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('usuario.html');

            $parametros = array();
            $parametros['usu'] = $usu;

            $conteudo = $template->render($parametros);
            echo $conteudo;

    }
}



?>