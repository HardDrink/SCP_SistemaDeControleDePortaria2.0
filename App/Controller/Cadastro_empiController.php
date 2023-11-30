<?php
class Cadastro_empiController
{
    public function index()
    {
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
            Alertas::Sucesso();
            }catch(\Exception $e){
                Alertas::Error();
                }
    }
    public function edit($id)
    {

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
                Alertas::na();
            }
    }
}
?>