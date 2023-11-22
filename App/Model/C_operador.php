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
}

?>