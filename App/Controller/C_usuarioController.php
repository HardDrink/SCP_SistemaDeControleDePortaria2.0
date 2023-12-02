<?php

class C_usuarioController
{
    public function index()
    {
        Protect::Protect();
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('C-usuario.html');

        $parametros = array();

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
    public function insert()
    {
        echo "<button class='btn btn-primary'><a href='?pagina=C_usuario' style='color: white'>Voltar</button>";
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