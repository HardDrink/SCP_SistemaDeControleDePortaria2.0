<?php

class CadastroOperador
{
    public static function insert($dadosPost)
    {
        $con = Connection::getConn();

        $sql = "INSERT INTO emp_empilhadeiristas (nome,ativo) VALUES (:nome, 1)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":nome", $dadosPost["nome"]);
        $result = $stmt->execute();

        if($result == 0) {
            throw new Exception("Não foi Possivel Cadastrar!");
        }
    }
    public static function update($dadosPost)
    {
        $con = Connection::getConn();
        $sql = "UPDATE emp_empilhadeiristas SET ativo = :ativo WHERE id_empilhadeirista = :id_empi";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":id_empi", $dadosPost["id"]);
        $stmt->bindValue(":ativo", $dadosPost["ativo"]);
        $result = $stmt->execute();

        if($result == 0) {
            throw new Exception("Não Foi Possivel Atualizar");
        }
    }
}

?>