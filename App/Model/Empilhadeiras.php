<?php
class EmpilhadeirasTodos
{
    public static function selecionaTodos()
    {
        $con = Connection::getConn();
        $sql = "SELECT * FROM empilhadeiras ORDER BY id_emp";
        $result = $con->prepare($sql);
        $result->execute();

        $resultado = array();

        while ($row = $result->fetchObject())
        {
            $resultado[] = $row;
        }

        if(!$resultado)
        {
            throw new Exception("Nenhum Resultado Encontrado no Banco De Dados!");
        }
        return $resultado;
    }
}

?>