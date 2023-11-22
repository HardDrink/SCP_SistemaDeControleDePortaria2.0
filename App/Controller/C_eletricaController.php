<?php

class C_eletricaController
{
    public function index()
    {
        try{

            $empilhadeira = C_eletrica::selecionaEmpi();
            $operador     = C_eletrica::selecionaOperador();

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('C-eletrica.html');

            $parametros = array();
            $parametros['empi'] = $empilhadeira;
            $parametros['opera'] = $operador;

            $conteudo = $template->render($parametros);
            echo $conteudo;
            

            }catch(\Exception $e){
                echo $e->getMessage();
            }
    }

    public static function insert()
    {
        try{
        C_eletrica::insert($_POST);
        Alertas::Sucesso();
        }
        catch(\Exception $e){
            Alertas::Error();
        }
    }

}


?>