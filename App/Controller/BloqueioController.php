<?php

class BloqueioController
{
    public function index()
    {

        try{
            Protect::Protect();
            $todos = bloqueioTodos::selecionaTodos();
            Protect::Protect();
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Bloqueio.html');

            $parametros = array();
            $parametros['bloqueio'] = $todos;

            $conteudo = $template->render($parametros);
            echo $conteudo;

            
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        CadastroPessoa::delete($id);
    }

    public function edit($id)
    {
        Protect::Protect();
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Edit-pessoa2.html');

            $todos = bloqueioTodos::edit($id);

            $parametros = array();
            $parametros['id']   = $todos->id_pes;
            $parametros['nome']   = $todos->nome;
            $parametros['rg']     = $todos->rg;
            $parametros['cpf']    = $todos->cpf;
            $parametros['cnh']    = $todos->cnh;
            $parametros['ativo']  = $todos->ativo;
            $parametros['motivo'] = $todos->motivo;

            $conteudo = $template->render($parametros);
            echo $conteudo;
    }

    public function save($id)
    {
        try{
            Alertas::Sucesso();
            echo "<button class='btn btn-primary'><a href='?pagina=bloqueio' style='color: white'>Voltar</button>";
            bloqueioTodos::save($_POST);
            
            }catch(\Exception $e){
                Alertas::Error();
            }
            
    }
}


?>