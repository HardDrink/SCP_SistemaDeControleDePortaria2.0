<?php

class EmpilhaCombustao
{
    public static function buscaEmpi()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM empilhadeiras ORDER BY id_emp";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $resultado = array();

        while($row = $stmt->fetch())
        {
            $resultado[] = $row;
        }
        return $resultado;
    }

    public static function buscaOperador()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM emp_empilhadeiristas ORDER BY ativo";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $resultado = array();

        while($row = $stmt->fetch())
        {
            $resultado[] = $row;
        }
        return $resultado;
    }
}



?>