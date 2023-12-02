<?php

class VisitaativaController
{
    public function index()
    {
        try{

            Protect::Protect();
            $todos = Visitaativa::selecionaAtivo();


            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Visitaativa.html');

            $parametros = array();
            $parametros['ativo'] = $todos;

            $conteudo = $template->render($parametros);
            echo $conteudo;


        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function saida($id)
    {
        try{
            Alertas::Sucesso();
            echo "<button class='btn btn-primary'><a href='?pagina=visitaativa' style='color: white'>Voltar</button>";
            Visitaativa::saida($id);
            }catch(\Exception $e){
                Alertas::Error();
            }
    }
}


?>