<?php

class EntradavisitaController
{
    public function index()
    {
        Protect::Protect();
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Entradavisita.html');

            $parametros = array();

            $conteudo = $template->render($parametros);
            echo $conteudo;
    }

    public function buscar()
    {

        try {    
            Protect::Protect();
            $busca = Entrada::buscar($_POST);
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Entradavisita1.html');

            $parametros = array();
            $parametros['id_pes'] = $busca->id_pes;
            $parametros['nome'] = $busca->nome;
            $parametros['cpf'] = $busca->cpf;
            $parametros['rg'] = $busca->rg;
            $parametros['cnh'] = $busca->cnh;
            $parametros['ativo'] = $busca->ativo;
            $parametros['motivo'] = $busca->motivo;

            $conteudo = $template->render($parametros);
            echo $conteudo;
    
        }
        catch(\Exception $e)
        {
            Alertas::cpf();
        }
    }
    
    public function insert()
    {
        try{
            echo "<button class='btn btn-primary'><a href='?pagina=entradavisita' style='color: white'>Voltar</button>";
            Entrada::insert($_POST);
            Alertas::Sucesso();
            }catch (\Exception $e) {
                $e->getMessage();
            }
    }
}


?>