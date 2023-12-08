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

        $placa = $dadosPost['placa_cavalo'];
        $placa1 = $dadosPost['placa_1'];
        $placa2 = $dadosPost['placa_2'];

        $sql = "INSERT INTO portaria_veiculo (placa_veic, placa1, placa2) VALUES (:placa, :placa1, :placa2)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":placa", $placa);
        $stmt->bindValue(":placa1", $placa1);
        $stmt->bindValue(":placa2", $placa2);
        $stmt->execute();

        $sql = "SELECT * FROM portaria_veiculo WHERE placa_veic = :placa3";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":placa3", $placa);
        $stmt->execute();
        $row = $stmt->fetch();
        $id = $row['id_veic'];

        $sql = "INSERT INTO portaria_visitante (id_pes, id_veic, veiculo, empresa , entrada, visitado, setor, operacao, observacao)
                                    VALUES (:id_pes, :id_veic, :veiculo, :empresa, NOW(), :visitado, :setor, :operacao, :observacao)";
    
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":id_pes", $dadosPost["id_pessoa"]);
        $stmt->bindValue(":id_veic", $id);
        $stmt->bindValue(":veiculo", $dadosPost["veiculo"]);
        $stmt->bindValue(":empresa", $dadosPost["empresa"]);
        $stmt->bindValue(":visitado", $dadosPost["visitado"]);
        $stmt->bindValue(":setor", $dadosPost["setor"]);
        $stmt->bindValue(":operacao", $dadosPost["operacao"]);
        $stmt->bindValue(":observacao", $dadosPost["observacao"]);
        $resultado = $stmt->execute();

        if(!$resultado)
        {
            throw new Exception("Deu Ruim!");
        }
    }
}


?>