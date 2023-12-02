<?php

class Login
{
    public static function check($dadosPost)
    {
        $con  = Connection::getConn();
        $sql  = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = md5(:senha)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":usuario", $dadosPost['usuario']);
        $stmt->bindValue(":senha", $dadosPost['senha']);
        $stmt->execute();

        $quantidade = $stmt->rowCount();

        if ($quantidade == 1)
        {
            $usuario = $stmt->fetch();

            if (!isset($_SESSION))
            {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['tipo'] = $usuario['tipo'];

            header("Location: ?pagina=home");
        }else
        {
            throw new Exception("Usuario ou Senha Errados!");
        }
    }
}




?>