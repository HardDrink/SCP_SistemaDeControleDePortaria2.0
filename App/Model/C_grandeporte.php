<?php

class EmpilhaGrande
{
    public static function BuscaEmpi()
    {

        $con = Connection::getConn();
        $sql = "SELECT * FROM empilhadeiras WHERE tipo IN (3,4) ORDER BY nome_emp";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $resultado = array();

        while ($row = $stmt->fetch())
        {
            $resultado[] = $row;
        }

        return $resultado;

    }
    public static function insert($dadosPost)
    {

        $con = Connection::getConn();

        $sql = "INSERT INTO emp_controle (id_emp,data,turno,operador,hori_inicio,hori_final,inicio,final,hori_abastecimento,quantidade,oleo,motor,transmissao,agua,freio,mangueira,desquerdo,desquerdoi,ddireito,ddireitoi,tesquerdo,tdireito) 
                                    VALUES (:id,:data,:turno,:operador,:hori_inicio,:hori_final,:inicio,:final,:hori_abastecimento,:quantidade,:oleo,:motor,:transmissao,:agua,:freio,:mangueira,:desquerdo,:desquerdoi,:ddireito,:ddireitoi,:tesquerdo,:tdireito)";
        
        $stmt = $con->prepare($sql);

        $stmt->bindValue(":id", $dadosPost["id_emp"]);
        $stmt->bindValue(":turno", $dadosPost["turno"]);
        $stmt->bindValue(":data", $dadosPost["data"]);
        $stmt->bindValue(":operador", $dadosPost["operador"]);
        $stmt->bindValue(":hori_inicio", $dadosPost["hori_inicio"]);
        $stmt->bindValue(":hori_final", $dadosPost["hori_final"]);
        $stmt->bindValue(":inicio", $dadosPost["inicio"]);
        $stmt->bindValue(":final", $dadosPost["final"]);
        $stmt->bindValue(":hori_abastecimento", $dadosPost["hori_abastecimento"]);
        $stmt->bindValue(":quantidade", $dadosPost["quantidade"]);
        $stmt->bindValue(":oleo", $dadosPost["oleo"]);
        $stmt->bindValue(":motor", $dadosPost["motor"]);
        $stmt->bindValue(":transmissao", $dadosPost["transmissao"]);
        $stmt->bindValue(":agua", $dadosPost["agua"]);
        $stmt->bindValue(":freio", $dadosPost["freios"]);
        $stmt->bindValue(":mangueira", $dadosPost["mangueiras"]);
        $stmt->bindValue(":desquerdo", $dadosPost["desquerdoe"]);
        $stmt->bindValue(":desquerdoi", $dadosPost["desquerdoi"]);
        $stmt->bindValue(":ddireito", $dadosPost["ddireitoe"]);
        $stmt->bindValue(":ddireitoi", $dadosPost["ddireitoi"]);
        $stmt->bindValue(":tesquerdo", $dadosPost["tesquerdo"]);
        $stmt->bindValue(":tdireito", $dadosPost["tdireito"]);

        $result = $stmt->execute();

        if ($result == 0) {
            throw new Exception("Não foi Possivel Cadastrar!");
        }



    }
}

?>