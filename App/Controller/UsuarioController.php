<?php

class UsuarioController
{

    public function index()
    {

        Protect::Protect();
        $usu = Usuarios::buscartodos();
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('usuario.html');

            $parametros = array();
            $parametros['usu'] = $usu;

            $conteudo = $template->render($parametros);
            echo $conteudo;

    }

    public function delete($id)
    {
        try{
            Alertas::Deletar();
            Usuarios::Deletar($id);
        }catch(\Exception $e){
            Alertas::Error();
        }
    }

    public function edit($id)
    {
        try{
            Protect::Protect();
            $busca = Usuarios::edit($id);        
                $loader = new \Twig\Loader\FilesystemLoader('App/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('Edit-usuario.html');

                $parametros = array();
                $parametros['id']      = $busca->id;
                $parametros['nome']    = $busca->nome;
                $parametros['usuario'] = $busca->usuario;
                $parametros['email']   = $busca->email;
                $parametros['tipo']    = $busca->tipo;

                $conteudo = $template->render($parametros);
                echo $conteudo;
            }catch(\Exception $e){
                Alertas::Error();
            }
    }

}



?>