<?php

class ListaoperadorController
{
    public function index()
    {
        try{

            Protect::Protect();
            $todos = ListaOperador::selecionarTodos();

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Lista-operador.html');

            $parametros = array();
            $parametros['operador'] = $todos;

            $conteudo = $template->render($parametros);
            echo $conteudo;
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }

    }
    public function update()
    {
        try{
            echo "<button class='btn btn-primary'><a href='?pagina=listaoperador' style='color: white'>Voltar</button>";
            CadastroOperador::update($_POST);
            Alertas::Altera();
            }
            catch(\Exception $e){
                Alertas::Error();
            }
    }
}


?>