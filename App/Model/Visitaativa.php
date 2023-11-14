<?php

class Visitaativa
{
    public static function selecionaAtivo()
    {
        $con = Connection::getConn();
        
        $sql = "SELECT * FROM portaria_visita WHERE saida = '0000-00-00 00:00:00' ORDER BY entrada";

        $stmt = $con->prepare($sql);
        $stmt->execute();

        $resultado = array();

        while ($row = $stmt->fetchObject()) {
            $resultado[] = $row;
        }
        return $resultado;
    }   
}


?>