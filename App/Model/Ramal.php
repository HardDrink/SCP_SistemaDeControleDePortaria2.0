<?php

class Ramal
{
    public static function selecionaTodos()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM telefones ORDER BY nome";
        $result = $con->prepare($sql);
        $result->execute();

        $resultado = array();
        
        while ($row = $result->fetchObject('Ramal')) 
        {
            $resultado[] = $row;
        }

        if(!$resultado) {
            throw new Exception('Não Existe Nenhum Registro No Banco!');
        }
        return $resultado;
    }
}


?>