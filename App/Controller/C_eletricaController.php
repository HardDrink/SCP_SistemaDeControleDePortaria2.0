<?php

class C_eletricaController
{
    public function index()
    {
        try{
            Protect::Protect();
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
            echo "<button class='btn btn-primary'><a href='?pagina=c_eletrica' style='color: white'>Voltar</button>";
        C_eletrica::insert($_POST);
        Alertas::Sucesso();
        }
        catch(\Exception $e){
            Alertas::Error();
        }
    }

}


?>