<?php

class CadastroPessoa
{
    public static function insert($dadosPost)
    {
        if (empty($dadosPost["nome"]) || empty($dadosPost['cpf'])) {
            throw new Exception("Preencha Todos Os Campos");

            return false;
        }

    $con = Connection::getConn();

    $sql = "INSERT INTO portaria_pessoa (nome, rg, cpf, cnh, ativo) VALUES (:nome, :rg, :cpf, :cnh, :ativo)";

    $result = $con->prepare($sql);

    $result->bindValue(":nome", $dadosPost["nome"]);
    $result->bindValue(":rg", $dadosPost["rg"]);
    $result->bindValue(":cpf", $dadosPost["cpf"]);
    $result->bindValue(":cnh", $dadosPost["cnh"]);
    $result->bindValue(":ativo", 1);

    $result->execute();

    var_dump($result);
    }
}
?>