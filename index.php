<?php

use Twig\Extra\Intl\IntlExtension;

//<------- Core -------->
require_once 'App/Core/Core.php';

//<------- Database ----->
require_once 'Lib/Database/Connection.php';

//<------- Funções Diversas ----->
require_once 'App/Functions/Alertas.php';

//<------- Models ------->
require_once 'App/Model/Ramal.php';
require_once 'App/Model/Listapessoas.php';
require_once 'App/Model/Bloqueio.php';
require_once 'App/Model/Empilhadeiras.php';
require_once 'App/Model/ListaOperador.php';
require_once 'App/Model/C_pessoa.php';
require_once 'App/Model/Entrada.php';
require_once 'App/Model/Visitaativa.php';
require_once 'App/Model/C_combusta.php';
require_once 'App/Model/C_eletrica.php';
require_once 'App/Model/C_grandeporte.php';
require_once 'App/Model/C_operador.php';
require_once 'App/Model/C_empilhadeira.php';
require_once 'App/Model/C_manutencao.php';
require_once 'App/Model/Usuario.php';



// <------ Controllers -------->
require_once 'App/Controller/HomeController.php';
require_once 'App/Controller/RamalController.php';
require_once 'App/Controller/GraficoController.php';
require_once 'App/Controller/RelatoriovisitaController.php';
require_once 'App/Controller/BloqueioController.php';
require_once 'App/Controller/VisitaativaController.php';
require_once 'App/Controller/EntradavisitaController.php';
require_once 'App/Controller/ListapessoaController.php';
require_once 'App/Controller/CadastropessoaController.php';
require_once 'App/Controller/Cadastro_operadorController.php';
require_once 'App/Controller/Cadastro_empiController.php';
require_once 'App/Controller/RelatorioempiController.php';
require_once 'App/Controller/C_grandeporteController.php';
require_once 'App/Controller/C_eletricaController.php';
require_once 'App/Controller/C_combustaoController.php';
require_once 'App/Controller/ListaoperadorController.php';
require_once 'App/Controller/ListaempiController.php';
require_once 'App/Controller/C_manutencaoController.php';
require_once 'App/Controller/UsuarioController.php';
require_once 'App/Controller/C_usuarioController.php';


require_once 'Vendor/autoload.php';

$template = file_get_contents('App/Template/estrutura.html');

ob_start();
    $core = new Core;
    $core->start($_GET);

    $saida = ob_get_contents();
ob_end_clean();

$tplPronto = str_replace('{{conteudo}}', $saida , $template);


echo $tplPronto;

?>