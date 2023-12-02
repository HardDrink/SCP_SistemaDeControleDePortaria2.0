<?php

class C_combustaoController
{
    public function index()
    {
        try{
            Protect::Protect();
            $opera = EmpilhaCombustao::buscaOperador();
            $busca = EmpilhaCombustao::buscaEmpi();

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('C-combustao.html');

            $parametros = array();
            $parametros['empi'] = $busca;
            $parametros['opera'] = $opera;

            $conteudo = $template->render($parametros);
            echo $conteudo;
            

        
            }catch(\Exception $e){
                echo $e->getMessage();
            }
    }

    public static function insert()
    {
        try{
        EmpilhaCombustao::insert($_POST);
        echo "<button class='btn btn-primary'><a href='?pagina=c_combustao' style='color: white'>Voltar</button>";
            Alertas::Sucesso();
        }
        catch(\Exception $e){
            Alertas::Error();
        }
    }
}


?>