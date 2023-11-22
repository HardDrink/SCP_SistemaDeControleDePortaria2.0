<?php

class C_grandeporteController
{
    public function index()
    {

        $operador = EmpilhaCombustao::buscaOperador();
        $empi = EmpilhaGrande::BuscaEmpi();

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('c-grandeporte.html');

            $parametros = array();
            $parametros['operador'] = $operador;
            $parametros['empilhadeira'] = $empi;

            $conteudo = $template->render($parametros);
            echo $conteudo;
    }
    public function insert()
    {
        try{
        EmpilhaGrande::insert($_POST);
        Alertas::Sucesso();
        }
        catch(\Exception $e){
            Alertas::Error();
        }
    }
}


?>