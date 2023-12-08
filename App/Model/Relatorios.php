<?php

class Relatorios
{
    public static function RelatorioEmpi($dadosPost)
    {
        if ($dadosPost['id_emp'] == "0")
        {
            $con = Connection::getConn();

            $sql = "SELECT * FROM emp_controle c INNER JOIN empilhadeiras e ON c.id_emp = e.id_emp WHERE (data BETWEEN :data_inicio AND :data_final)";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":data_inicio", $dadosPost['data_inicio']);
            $stmt->bindValue(":data_final", $dadosPost['data_final']);
            $stmt->execute();

            $resultado = array();
            
            while ($row = $stmt->fetchObject())
            {
                $resultado[] = $row;
            }

            return $resultado;
        }else
        {
            $con = Connection::getConn();

            $sql = "SELECT * FROM emp_controle c INNER JOIN empilhadeiras e ON c.id_emp = e.id_emp WHERE (data BETWEEN :data_inicio AND :data_final AND c.id_emp = :id)";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":data_inicio", $dadosPost['data_inicio']);
            $stmt->bindValue(":data_final", $dadosPost['data_final']);
            $stmt->bindValue(":id", $dadosPost['id_emp']);
            $stmt->execute();

            $resultado = array();
            
            while ($row = $stmt->fetchObject())
            {
                $resultado[] = $row;
            }

            return $resultado;
        }

    }

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


    public static function visitaativa($dadosPost)
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM portaria_visitante 
                INNER JOIN portaria_pessoa ON portaria_pessoa.id_pes = portaria_visitante.id_pes
                INNER JOIN portaria_veiculo ON portaria_veiculo.id_veic = portaria_visitante.id_veic
                WHERE entrada BETWEEN :inicio AND :final
                ORDER BY entrada ASC";
        
        $stmt = $con->prepare($sql,);
        $stmt->bindValue(":inicio", $dadosPost['data_inicio']);
        $stmt->bindValue(":final", $dadosPost['data_final']);
        $stmt->execute();

        $resultado = array();

        while ($row = $stmt->fetchObject())
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
/*SELECT * FROM 
            portaria_visitante v,
            portaria_pessoa    pp,
            portaria_veiculo   pv
WHERE 		
			v.id_pes = pp.id_pes
        AND v.id_veic = pv.id_veic
        AND entrada 
        BETWEEN '2023-12-05' AND '2023-12-07'  
ORDER BY `v`.`entrada` DESC
*/
?>

