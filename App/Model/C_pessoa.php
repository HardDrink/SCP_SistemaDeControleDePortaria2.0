<?php

class CadastroPessoa
{
    public static function insert($dadosPost)
    {
    $con = Connection::getConn();

    $sql1 = "SELECT * FROM portaria_pessoa WHERE cpf = :cpf1";
    $result1 = $con->prepare($sql1);
    $result1->bindValue(":cpf1", $dadosPost["cpf"]);
    $result1->execute();
    $result2 = $result1->fetchAll();
    
    if(count($result2) > 0)
    {
        Alertas::Igual();
    }else
    {
        $sql = "INSERT INTO portaria_pessoa (nome, rg, cpf, cnh, ativo) VALUES (:nome, :rg, :cpf, :cnh, :ativo)";
        $result = $con->prepare($sql);

        $nome = $dadosPost["nome"];

        $result->bindValue(":nome", strtoupper($nome));
        $result->bindValue(":rg", $dadosPost["rg"]);
        $result->bindValue(":cpf", $dadosPost["cpf"]);
        $result->bindValue(":cnh", $dadosPost["cnh"]);
        $result->bindValue(":ativo", 1);
        $resultado = $result->execute();

        if ($resultado === false) {
            throw new Exception("Não Foi Possivel Cadastrar!");
        }
    }

    }

    public static function save($dadosPost)
    {
        $con = Connection::getConn();
        $sql1 = "UPDATE portaria_pessoa SET nome = :nome, rg = :rg, cpf = :cpf, cnh = :cnh WHERE id_pes = :id";
        $result1 = $con->prepare($sql1);
        $result1->bindValue(":id", $dadosPost["id"]);
        $result1->bindValue(":nome", $dadosPost["nome"]);
        $result1->bindValue(":rg", $dadosPost["rg"]);
        $result1->bindValue(":cpf", $dadosPost["cpf"]);
        $result1->bindValue(":cnh", $dadosPost["cnh"]);
        $resultado = $result1->execute();

        if ($resultado == 0)
        {
            throw new Exception("Não Possivel Alterar!");
        }

    }

    public static function buscarPessoa($id)
    {
        $con = Connection::getConn();
        $sql1 = "SELECT * FROM portaria_pessoa WHERE id_pes = :id";
        $result1 = $con->prepare($sql1);
        $result1->bindValue(":id", $id);
        $result1->execute();

        return $result1->fetchObject();
    }

    public static function delete ($id)
    {
        $con = Connection::getConn();
        $sql1 = "DELETE FROM portaria_pessoa WHERE id_pes = :id";
        $result1 = $con->prepare($sql1);
        $result1->bindValue(":id", $id);
        $resultado = $result1->execute();

        if ($resultado == 0)
        {
            throw new Exception("Não Foi Possivel Deletar");
        }

    }
}
?>