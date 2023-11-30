<?php

class Entrada
{
    public static function buscar($dadosPost)
    {
        $con = Connection::getConn();
        $sql = "SELECT * FROM portaria_pessoa WHERE cpf = :cpf";
        $result = $con->prepare($sql);
        $result->bindValue(":cpf", $dadosPost["cpf"]);
        $resultado = $result->execute();

        $resultado1 = $result->fetchObject();
        
        if ($resultado1 == false)
        {
            throw new Exception("Não Existe Pessoa Cadastrada!");
        } else
        {
            return $resultado1;
        }




    }
    public static function insert($dadosPost)
    {
        $con = Connection::getConn();

        $sql = "INSERT INTO portaria_visita (id_pessoa, nome_visita, cpf_visita, rg_visita, cnh_visita, placa_cavalo, placa_1, placa_2, veiculo,empresa , entrada, visitado, setor, operacao, observacao)
                                    VALUES (:id_pessoa, :nome, :cpf, :rg, :cnh, :placa_cavalo, :placa_1, :placa_2, :veiculo, :empresa, NOW(), :visitado, :setor, :operacao, :observacao)";
    
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":id_pessoa", $dadosPost["id_pessoa"]);
        $stmt->bindValue(":nome", $dadosPost["nome"]);
        $stmt->bindValue(":cpf", $dadosPost["cp1"]);
        $stmt->bindValue(":rg", $dadosPost["rg"]);
        $stmt->bindValue(":cnh", $dadosPost["cnh"]);
        $stmt->bindValue(":placa_cavalo", $dadosPost["placa_cavalo"]);
        $stmt->bindValue(":placa_1", $dadosPost["placa_1"]);
        $stmt->bindValue(":placa_2", $dadosPost["placa_2"]);
        $stmt->bindValue(":veiculo", $dadosPost["veiculo"]);
        $stmt->bindValue(":empresa", $dadosPost["empresa"]);
        $stmt->bindValue(":visitado", $dadosPost["visitado"]);
        $stmt->bindValue(":setor", $dadosPost["setor"]);
        $stmt->bindValue(":operacao", $dadosPost["operacao"]);
        $stmt->bindValue(":observacao", $dadosPost["observacao"]);

        $stmt->execute();
    }
}


?>