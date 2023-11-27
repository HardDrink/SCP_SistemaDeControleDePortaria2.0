<?php

class ListaOperador
{
    public static function selecionarTodos()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM emp_empilhadeiristas ORDER BY ativo DESC";
        $result = $con->prepare($sql);
        $result->execute();

        $resultado = array();
        
        while ($row = $result->fetchObject())
        {
            $resultado[] = $row;
        }

        if(!$resultado)
        {
            throw new Exception("Não Foi Encontrado Nenhum Resultado No Banco De Dados!");
        }

        return $resultado;
    }
}


?>