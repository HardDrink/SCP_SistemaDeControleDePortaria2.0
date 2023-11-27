<?php

class Manutencao
{
    public static function insert($dadosPost)
    {
        $con = Connection::getConn();

        $ordem_servico = $dadosPost['ordem_servico'];
        $horimetro     = $dadosPost['horimetro'];
        $problema      = $dadosPost['problema'];
        $servicos      = $dadosPost['servicos'];
        $descricao     = $dadosPost['descricao'];
        $at_inicial    = $dadosPost['at_inicial'];
        $at_final      = $dadosPost['at_final'];

        $manutencao    = "";

        if(strlen($ordem_servico)>0)$manutencao  .="Ordem de Servico:$ordem_servico/ ";
        if(strlen($horimetro)>0)$manutencao      .="Horímetro:$horimetro/ ";
        if(strlen($problema)>0)$manutencao       .="Problema:$problema/ ";
        if(strlen($servicos)>0)$manutencao       .="Serviços Executados:$servicos/ ";
        if(strlen($descricao)>0)$manutencao      .="Descrição:$descricao/ ";
        if(strlen($at_inicial)>0)$manutencao     .="Horário Inicial:$at_inicial/ ";
        if(strlen($at_final)>0)$manutencao       .="Horário Final:$at_final";

        if(strlen($manutencao)==0)$manutencao="-";

        $sql = "INSERT INTO emp_controle (id_emp, operador, manutencao) VALUES (:id_emp, :opera, :manutencao)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":id_emp", $dadosPost['id_emp']);
        $stmt->bindParam(":opera", $dadosPost['operador']);
        $stmt->bindValue("manutencao", $manutencao);
        $resultado = $stmt->execute();

        if($resultado == 0){
            throw new Exception("Não Foi Possivel Cadastrar!");
        }

    }
}


?>