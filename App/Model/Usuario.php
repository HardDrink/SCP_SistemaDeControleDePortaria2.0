<?php

class Usuarios
{
    public static function buscartodos()
    {
        $con = Connection::getConn();
        $sql = "SELECT * FROM usuarios ORDER BY nome";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $resultado = [];
        
        while ($row = $stmt->fetchObject())
        {
            $resultado[] = $row;
        }

        return $resultado;

    }

    public static function Deletar($id)
    {
        $con = Connection::getConn();

        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":id",$id);
        $resultado = $stmt->execute();

        if(!$resultado)
        {
            throw new Exception ("não foi possivel deletar!");
        }
    }

    public static function edit($id)
    {
        $con = Connection::getConn();
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

    public static function insert($dadosPost)
    {
        $con = Connection::getConn();
        $sql = "INSERT INTO usuarios (nome, email, usuario, senha, tipo, date) VALUES 
                                     (:nome, :email, :usuario, md5(:senha), :tipo, NOW())";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":nome", $dadosPost['nome']);
        $stmt->bindValue(":email",$dadosPost['email']);
        $stmt->bindValue(":usuario",$dadosPost['usuario']);
        $stmt->bindValue(":senha",$dadosPost['senha']);
        $stmt->bindValue(":tipo",$dadosPost['tipo']);
        $resultado = $stmt->execute();

        if(!$resultado)
        {
            throw new Exception("Não foi possivel Inserir");
        }
    }

    public static function save($dadosPost)
    {
        $con = Connection::getConn();

        $nome    = $dadosPost['nome'];
        $id      = $dadosPost['id'];
        $usuario = $dadosPost['usuario'];
        $email   = $dadosPost['email'];
        $senha   = $dadosPost['senha'];
        $tipo    = $dadosPost['tipo'];

        if ($senha == null)
        {
            $sql = "UPDATE usuarios SET nome = :nome, email = :email, usuario = :usuario, tipo = :tipo WHERE id = :id";
    
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":usuario", $usuario);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":tipo", $tipo);
            $resultado = $stmt->execute();
        }
        else 
        {
            $sql = "UPDATE usuarios SET nome = :nome, email = :email, usuario = :usuario, tipo = :tipo, senha = md5(:senha) WHERE id = :id";
    
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":usuario", $usuario);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":tipo", $tipo);
            $stmt->bindValue(":senha", $senha);
            $resultado = $stmt->execute(); 
        }

        if (!$resultado)
        {
            throw new Exception("Não foi Possivel Alterar");
        }

    }

    public static function alterarSenha($id)
    {
        
    }

}

?>