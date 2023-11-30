<?php

class bloqueioTodos
{
    public static function selecionaTodos()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM portaria_pessoa ORDER BY nome";
        $result = $con->prepare($sql);
        $result->execute();

        $resultado = array();

        while ($row = $result->fetchObject())
        {
            $resultado[] = $row;
        }
        if(!$resultado)
        {
            throw new Exception("Não Existe Nenhum Registro no Banco de Dados!");
        }

        return $resultado;
    }

    public static function edit($id)

    {
        $con = Connection::getConn();
        $sql = "SELECT * FROM portaria_pessoa WHERE id_pes = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    public static function save($dadosPost)
    {
        $con = Connection::getConn();
        $sql1 = "UPDATE portaria_pessoa SET nome = :nome, rg = :rg, cpf = :cpf, cnh = :cnh, ativo = :ativo, motivo = :motivo WHERE id_pes = :id";
        $result1 = $con->prepare($sql1);
        $result1->bindValue(":id", $dadosPost["id"]);
        $result1->bindValue(":nome", $dadosPost["nome"]);
        $result1->bindValue(":rg", $dadosPost["rg"]);
        $result1->bindValue(":cpf", $dadosPost["cpf"]);
        $result1->bindValue(":cnh", $dadosPost["cnh"]);
        $result1->bindValue(":ativo", $dadosPost["ativo"]);
        $result1->bindValue(":motivo", $dadosPost["motivo"]);
        $resultado = $result1->execute();

        if ($resultado == 0)
        {
            throw new Exception("Não Possivel Alterar!");
        }

    }

}




?>