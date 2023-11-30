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

}

?>