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
        $result->bindValue(":nome", $dadosPost["nome"]);
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
}
?>