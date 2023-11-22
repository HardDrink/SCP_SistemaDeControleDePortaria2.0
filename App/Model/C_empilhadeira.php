<?php

class CadastroEmpi
{
    public static function insert($dadosPost)
    {
        $con = Connection::getConn();

        $sql = "INSERT INTO empilhadeiras (nome_emp, chassi, combustivel, horimetro, tipo) VALUES (:nome, :chassi, :combustivel, :horimetro, :tipo)";
        
        $stmt = $con->prepare($sql);
        
        $stmt->bindValue(":nome", $dadosPost["nome_emp"]);
        $stmt->bindValue(":chassi", $dadosPost["chassi"]);
        $stmt->bindValue(":combustivel", $dadosPost["combustivel"]);
        $stmt->bindValue(":horimetro", $dadosPost["horimetro"]);
        $stmt->bindValue(":tipo", $dadosPost["tipo"]);
        
        $result = $stmt->execute();

        if ($result == 0)
        {
            throw new Exception("Não Foi Possivel Cadastrar");
        }
        
        }
}

?>