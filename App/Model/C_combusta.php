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

        $sql = "INSERT INTO emp_controle (`id_emp`,`data`,`turno`,`operador`,`hori_inicio`,`hori_final`,`inicio`,`final`,`oleo`,`agua`,`hidraulico`,`transmissao`,`freio`,`mangueira`,
                                            `desquerdo`,`ddireito`,`tesquerdo`,`tdireito`,`limpeza`) VALUES
                                         (:id, :data1, :turno, :operador, :hori_inicio, :hori_final, :inicio, :final, :oleo, :agua, :hidraulico, 
                                         :transmissao, :freio, :mangueira, :desquerdo, :ddireito, :tesquerdo, :tdireito, 
                                         :limpeza)";
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

        $result = $stmt->execute();

        if($result == 0)
        {
            throw new Exception("Não foi possivel Cadastrar");
        }

    }
}



?>