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

        public static function buscarEmpi($id)
        {
            $con = Connection::getConn();
            $sql = "SELECT * FROM empilhadeiras WHERE id_emp = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            
            return $stmt->fetchObject();
        }
        public static function edit($dadosPost)
        {
            $con = Connection::getConn();
            $sql = "UPDATE empilhadeiras SET nome_emp = :nome, chassi = :chassi, combustivel = :combustivel, horimetro = :horimetro, tipo = :tipo WHERE id_emp = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":id", $dadosPost["id"]);
            $stmt->bindValue(":nome", $dadosPost["nome_emp"]);
            $stmt->bindValue(":chassi", $dadosPost["chassi"]);
            $stmt->bindValue(":combustivel", $dadosPost["combustivel"]);
            $stmt->bindValue(":horimetro", $dadosPost["horimetro"]);
            $stmt->bindValue(":tipo", $dadosPost["tipo"]);
            $resultdado = $stmt->execute();

            if ($resultdado == 0)
            {
                throw new Exception("Não Possivel Alterar!");
            }
        }

        public static function delete($id)
        {
            $con = Connection::getConn();
            $sql = "DELETE FROM empilhadeiras WHERE id_emp = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":id", $id);
            $resultado = $stmt->execute();

            if ($resultado == 0)
            {
                throw new Exception("Não Foi Possivel Deletar");
            }

        }

        public static function manutencao($id)
        {
            $con = Connection::getConn();
            $sql = "SELECT * FROM emp_controle WHERE id_emp = :id AND LENGTH (manutencao)>5";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();

            $resultado = [];

            while ($row = $stmt->fetch())
            {
                $resultado[] = $row;
            }

            if (!$resultado)
            {
                throw new Exception("Não Existe Nenhum Resultado No Banco!!!");
            }

            return $resultado;


    
        }
}

?>