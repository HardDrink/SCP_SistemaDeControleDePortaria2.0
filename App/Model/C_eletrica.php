<?php

class C_eletrica
{
    public static function selecionaEmpi()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM empilhadeiras WHERE combustivel = 3 ORDER BY id_emp";

        $stmt = $con->prepare($sql);
        $stmt->execute();

        $resultado = array();

        while($row = $stmt->fetch())
        {
            $resultado[] = $row;
        }

        if(!$resultado)
        {
            throw new Exception("Não Existe Nenhum Registro No Banco De Dados!");
        }

        return $resultado;
    }
    public static function selecionaOperador()
    {
        $con = Connection::getConn();
        $sql = "SELECT * FROM emp_empilhadeiristas WHERE ativo = 1 ORDER BY nome";

        $stmt = $con->prepare($sql);
        $stmt->execute();

        $resultado = array();

        while($row = $stmt->fetch())
        {
            $resultado[] = $row;
        }

        
        if(!$resultado)
        {
            throw new Exception("Não Existe Nenhum Registro No Banco De Dados!");
        }

        return $resultado;
    }

    public static function insert($dadosPost)
    {
        $con = Connection::getConn();

        $sql = "INSERT INTO emp_controle (`id_emp`,`data`,`turno`,`operador`,`hori_inicio`,`hori_final`,`inicio`,`final`,`oleo`,`agua`,`redutor`,`tracao`,`direita`,`esquerda`,`limpeza`,`anormalidades`)VALUES 
                                         (:id_emp, :data1, :turno, :operador, :hori_inicio,:hori_final, :inicio, :final, :oleo,:agua,:redutor,:tracao,:direita,:esquerda,:limpeza,:anormalidades)";
        
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":id_emp", $dadosPost['id_emp']);
        $stmt->bindValue(":data1", $dadosPost['data1']);
        $stmt->bindvalue(":inicio", $dadosPost['inicio']);
        $stmt->bindvalue(":final", $dadosPost['final']);
        $stmt->bindvalue(":operador", $dadosPost['operador']);
        $stmt->bindvalue(":turno", $dadosPost['turno']);
        $stmt->bindvalue(":hori_final", $dadosPost['hori_final']);
        $stmt->bindvalue(":hori_inicio", $dadosPost['hori_inicio']);
        $stmt->bindvalue(":oleo", $dadosPost['oleo']);
        $stmt->bindvalue(":agua", $dadosPost['agua']);
        $stmt->bindvalue(":redutor", $dadosPost['redutor']);
        $stmt->bindvalue(":tracao", $dadosPost['tracao']);
        $stmt->bindvalue(":direita", $dadosPost['direita']);
        $stmt->bindvalue(":esquerda", $dadosPost['esquerda']);
        $stmt->bindvalue(":limpeza", $dadosPost['limpeza']);
        $stmt->bindvalue(":anormalidades", $dadosPost['anormalidades']);

        $ordem_servico  = $dadosPost = ['ordem_servico'];
        $horimetro      = $dadosPost = ['horimetro'];
        $horimetro      =str_replace(",", ".", $horimetro);
        $problema       = $dadosPost = ['problema'];
        $servicos       = $dadosPost = ['servicos'];
        $descricao      = $dadosPost = ['descricao'];
        $at_inicial     = $dadosPost = ['at_inicial'];
        $at_final       = $dadosPost = ['at_final'];

        $result = $stmt->execute();

        //var_dump($result);

        if($result == 0)
        {
            throw new Exception("Não foi possivel Cadastrar");
        }
    }


}

?>