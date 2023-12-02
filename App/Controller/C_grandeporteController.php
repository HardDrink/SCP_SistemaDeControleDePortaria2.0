<?php

class C_grandeporteController
{
    public function index()
    {
        Protect::Protect();
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

            echo "<button class='btn btn-primary'><a href='?pagina=c_grandeporte' style='color: white'>Voltar</button>";
            EmpilhaGrande::insert($_POST);
            Alertas::Sucesso();
            }
            catch(\Exception $e){
                Alertas::Error();
            }
    }
}


?>