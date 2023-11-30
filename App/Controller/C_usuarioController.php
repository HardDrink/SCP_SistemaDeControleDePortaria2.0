<?php

class C_usuarioController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('C-usuario.html');

        $parametros = array();

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
    public function insert()
    {
        Usuarios::insert($_POST);
    }

    public function save($id)
    {
        try{
                Alertas::Altera();
                Usuarios::save($_POST);
            }catch(\Exception $e){
                Alertas::Error();
            }
    }
}


?>