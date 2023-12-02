<?php

class ManutencaoController 
{
    public function index()
    {
        Protect::Protect();
        $buscaempi     = EmpilhaCombustao::buscaEmpi();
        $buscaoperador = EmpilhaCombustao::buscaOperador();


        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('C-manutencao.html');

        $parametros = array();
        $parametros['empi'] = $buscaempi;
        $parametros['opera'] = $buscaoperador;

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function insert()
    {   
        try{
            echo "<button class='btn btn-primary'><a href='?pagina=manutencao' style='color: white'>Voltar</button>";
            Manutencao::insert($_POST);
            Alertas::Sucesso();
            }
            catch(\Exception $e){
                Alertas::Error();
            }
    }
}

?>