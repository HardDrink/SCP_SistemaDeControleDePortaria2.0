<?php

class C_combustaoController
{
    public function index()
    {
        try{

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

        echo '<script>alert("Cadastro Realizado")</script>';
        echo '<script>location.href="http://localhost/intranetPOO/?pagina=c_combustao"</script>';
        }
        catch(\Exception $e){
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/intranetPOO/?pagina=c_combustao"</script>';
        }
    }
}


?>