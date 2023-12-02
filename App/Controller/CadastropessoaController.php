<?php

class CadastropessoaController
{
    public function index()
    {
        Protect::Protect();
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('cadastro-pessoa.html');

            $parametros = array();

            $conteudo = $template->render($parametros);
            echo $conteudo;
    }

    public function insert()
    {
        try {
            echo "<button class='btn btn-primary'><a href='?pagina=cadastropessoa' style='color: white'>Voltar</button>";
            Alertas::Sucesso();
            CadastroPessoa::insert($_POST);
            }
            catch (\Exception $e) {
                Alertas::Error();
                //echo $e->getMessage();
        }
    }

    public function edit($id)
    {

        Protect::Protect();
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        
        $template = $twig->load('Edit-pessoa.html');
        
        $pessoa = CadastroPessoa::buscarPessoa($id);

        $parametros = array();
        $parametros['id_pes'] = $pessoa->id_pes;
        $parametros['nome'] = $pessoa->nome;
        $parametros['rg'] = $pessoa->rg;
        $parametros['cpf'] = $pessoa->cpf;
        $parametros['cnh'] = $pessoa->cnh;

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function save($id)
    {
        try{
        Alertas::Altera();
        CadastroPessoa::save($_POST);
        }
        catch (\Exception $e) {
            Alertas::Error();
        }
    }

    public function delete($id)
    {
        try{
            echo "<button class='btn btn-primary'><a href='?pagina=listavisita' style='color: white'>Voltar</button>";
            Alertas::Sucesso();
            CadastroPessoa::delete($id);
        }
            catch (\Exception $e) {
                Alertas::Error();
            }

    }
}


?>