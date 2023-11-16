<?php

class EmpilhaCombustao
{
    public static function buscaEmpi()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM empilhadeiras WHERE combustivel IN (1,2,4) ORDER BY id_emp;";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $resultado = array();

        while($row = $stmt->fetch())
        {
            $resultado[] = $row;
        }
        return $resultado;
    }

    public static function buscaOperador()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM emp_empilhadeiristas WHERE ativo = 1";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $resultado = array();

        while($row = $stmt->fetch())
        {
            $resultado[] = $row;
        }
        return $resultado;
    }

    public static function insert($dadosPost)
    {
        $con = Connection::getConn();

        $sql = "INSERT INTO emp_controle (`id_emp`,`data`,`turno`,`operador`,`hori_inicio`,`hori_final`
                                            ,`inicio`,`final`,`oleo`,`agua`,`hidraulico`,`transmissao`,`freio`,`mangueira`,
                                            `desquerdo`,`ddireito`,`tesquerdo`,`tdireito`,`limpeza`,`anormalidades`,`manutencao`) VALUES
                                         (:id, :data1, :turno, :operador, :hori_inicio, :hori_final, :inicio, :final, :oleo, :agua, :hidraulico, 
                                         :transmissao, :freio, :mangueira, :desquerdo, :ddireito, :tesquerdo, :tdireito, 
                                         :limpeza, :anormalidades, :manutencao)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":id", $dadosPost["id_emp"]);
        $stmt->bindValue(":data1", $dadosPost["data1"]);
        $stmt->bindValue(":turno", $dadosPost["turno"]);
        $stmt->bindValue(":operador", $dadosPost["operador"]);
        $stmt->bindValue(":hori_inicio", $dadosPost["hori_inicio"]);
        $stmt->bindValue(":hori_final", $dadosPost["hori_final"]);
        $stmt->bindValue(":inicio", $dadosPost["inicio"]);
        $stmt->bindValue(":final", $dadosPost["final"]);
        $stmt->bindValue(":oleo", $dadosPost["oleo"]);
        $stmt->bindValue(":agua", $dadosPost["agua"]);
        $stmt->bindValue(":hidraulico", $dadosPost["hidraulico"]);
        $stmt->bindValue(":transmissao", $dadosPost["trasmissao"]);
        $stmt->bindValue(":freio", $dadosPost["freio"]);
        $stmt->bindValue(":mangueira", $dadosPost["mangueira"]);
        $stmt->bindValue(":desquerdo", $dadosPost["desquerdo"]);
        $stmt->bindValue(":ddireito", $dadosPost["ddireito"]);
        $stmt->bindValue(":tesquerdo", $dadosPost["tesquerdo"]);
        $stmt->bindValue(":tdireito", $dadosPost["tdireito"]);
        $stmt->bindValue(":limpeza", $dadosPost["limpeza"]);

        $anormalidades = $dadosPost = $_POST['anormalidades'];

        if (strlen($anormalidades) == 0 ) $anormalidades="-";

        $ordem_servico  = $dadosPost = ['ordem_servico'];
        $horimetro      = $dadosPost = ['horimetro'];
        $horimetro      =str_replace(",", ".", $horimetro);
        $problema       = $dadosPost = ['problema'];
        $servicos       = $dadosPost = ['servicos'];
        $descricao      = $dadosPost = ['descricao'];
        $at_inicial     = $dadosPost = ['at_inicial'];
        $at_final       = $dadosPost = ['at_final'];

        $manutencao = "";

        /*if(count($ordem_servico)>0)
        {
            $manutencao1  = "Ordem de serviço: ";
            $manutencao1 .=$ordem_servico;
        }
        if(strlen($horimetro)>0)$manutencao      .="Horímetro:$horimetro/ ";
        if(strlen($problema)>0)$manutencao       .="Problema:$problema/ ";
        if(strlen($servicos)>0)$manutencao       .="Serviços Executados:$servicos/ ";
        if(strlen($descricao)>0)$manutencao      .="Descrição:$descricao/ ";
        if(strlen($at_inicial)>0)$manutencao     .="Horário Inicial:$at_inicial/ ";
        if(strlen($at_final)>0)$manutencao       .="Horário Final:$at_final";*/

        //if(strlen($manutencao)==0)$manutencao="-";

        $stmt->bindValue(":anormalidades",$anormalidades);
        $stmt->bindValue(":manutencao", $manutencao);
        $result = $stmt->execute();

        if($result == 0)
        {
            throw new Exception("Não foi possivel Cadastrar");
        }

    }
}



?>