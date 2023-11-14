<?php

class bloqueioTodos
{
    public static function selecionaTodos()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM portaria_pessoa ORDER BY nome";
        $result = $con->prepare($sql);
        $result->execute();

        $resultado = array();

        while ($row = $result->fetchObject())
        {
            $resultado[] = $row;
        }
        if(!$resultado)
        {
            throw new Exception("Não Existe Nenhum Registro no Banco de Dados!");
        }

        return $resultado;

    }
}




?>