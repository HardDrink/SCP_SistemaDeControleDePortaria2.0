<?php
class Cadastro_empiController
{
    public function index()
    {   
        Protect::Protect();
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Cadastro_empi.html');

            $parametros = array();

            $conteudo = $template->render($parametros);
            echo $conteudo;
    }

    public function insert()
    {
        try{
            CadastroEmpi::insert($_POST);
            echo "<button class='btn btn-primary'><a href='?pagina=cadastro_empi' style='color: white'>Voltar</button>";
            Alertas::Sucesso();
            }catch(\Exception $e){
                Alertas::Error();
                }
    }
    public function edit($id)
    {
        Protect::Protect();
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('edit_empi.html');

        $empi = CadastroEmpi::buscarEmpi($id);

        $parametros = array();
        $parametros['id'] = $empi->id_emp;
        $parametros['nome'] = $empi->nome_emp;
        $parametros['chassi'] = $empi->chassi;
        $parametros['combustivel'] = $empi->combustivel;
        $parametros['horimetro'] = $empi->horimetro;
        $parametros['tipo'] = $empi->tipo;

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function save($id)
    {
        try {
            echo "<button class='btn btn-primary'><a href='?pagina=listaempi' style='color: white'>Voltar</button>";
            Alertas::Altera();
            CadastroEmpi::edit($_POST);
            }
            catch(\Exception $e){
                Alertas::Error();
                //$e->getMessage();
            }
    }

    public function delete($id)
    {
        CadastroEmpi::delete($id);
        header('Location:?pagina=listaempi');
    }

    public function manutencao($id)
    {
        try{
            Protect::Protect();
            $empi = CadastroEmpi::buscarEmpi($id);
            $manutencao = CadastroEmpi::manutencao($id);

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Manutencao.html');

            $parametros = array();
            $parametros['manu'] = $manutencao;
            $parametros['id'] = $empi->id_emp;
            $parametros['nome'] = $empi->nome_emp;

            $conteudo = $template->render($parametros);
            echo $conteudo;
            }
            catch(\Exception $e){
                echo "<button class='btn btn-primary'><a href='?pagina=listaempi' style='color: white'>Voltar</button>";
                Alertas::na();
            }
    }
}
?>