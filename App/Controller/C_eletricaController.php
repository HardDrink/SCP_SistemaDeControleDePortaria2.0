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
        //var_dump($_POST);
        Alertas::Sucesso();
        //echo "<meta http-equiv='refresh' content='1.5; URL='?pagina=c_eletrica''/>";
        //echo '<script>location.href="http://localhost/intranetPOO/?pagina=c_eletrica"</script>';
        //echo '<script>alert("Cadastro Realizado")</script>';
        }
        catch(\Exception $e){
            Alertas::Error();
            //echo '<script>location.href="http://localhost/intranetPOO/?pagina=c_eletrica"</script>';
        }
    }

}


?>