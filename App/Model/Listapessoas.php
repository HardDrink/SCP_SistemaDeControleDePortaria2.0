<?php

class ListaPessoas
{
    public static function selecionaTodos()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM portaria_pessoa ORDER BY nome";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $resultado = array();

        while($row = $stmt->fetchObject())
        {
            $resultado[] = $row;
        }
        if(!$resultado)
        {
            throw new Exception('Não foi encontrado Nenhum Registro No Banco De Dados!');
        }
        return $resultado;
    }
}

?>