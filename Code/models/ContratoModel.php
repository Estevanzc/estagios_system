<?php

namespace Model;

use Model\VO\ContratoVO;
use Controller\ContratoController;

final class ContratoModel extends Model
{

    public function selectAll($vo)
    {
        $db = new Connection();
        $query = "SELECT * FROM contratos";
        $data = $db->select($query);

        $arrayDados = [];

        foreach ($data as $row) {
            $vo = new ContratoVO($row["id"], $row["processo"], $row["encaminhamento"], $row["area"], $row["data_inicio"], $row["data_fim"], $row["media_final"], $row["supervisor"], $row["s_cargo"], $row["s_telefone"], $row["s_email"], $row["observacao"], $row["encerramento"], $row["id_empresa"], $row["id_estudante"], $row["id_professor"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo)
    {
        $db = new Connection();
        $query = "SELECT * FROM contratos WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new ContratoVO($data[0]["id"], $data[0]["processo"], $data[0]["encaminhamento"], $data[0]["area"], $data[0]["data_inicio"], $data[0]["data_fim"], $data[0]["media_final"], $data[0]["supervisor"], $data[0]["s_cargo"], $data[0]["s_telefone"], $data[0]["s_email"], $data[0]["observacao"], $data[0]["encerramento"], $data[0]["id_empresa"], $data[0]["id_estudante"], $data[0]["id_professor"]);
    }

    public function insert($vo)
    {
        $db = new Connection();
        $query = "INSERT INTO contratos VALUES (default, :processo, :encaminhamento, :area, :data_inicio, :data_fim, :media_final, :supervisor, :s_cargo, :s_telefone, :s_email, :observacao, :encerramento, :id_empresa, :id_estudante, :id_professor)";
        $binds = [
            "processo" => $vo->getProcesso(),
            "encaminhamento" => $vo->getEncaminhamento(),
            "area" => $vo->getArea(),
            "data_inicio" => $vo->getData_inicio(),
            "data_fim" => $vo->getData_fim(),
            "supervisor" => $vo->getSupervisor(),
            "s_cargo" => $vo->getS_cargo(),
            "s_telefone" => $vo->getS_telefone(),
            "s_email" => $vo->getS_email(),
            "encerramento" => $vo->getEncerramento(),
            "id_empresa" => $vo->getId_empresa(),
            "id_estudante" => $vo->getId_estudante(),
            "id_professor" => $vo->getId_professor()
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo)
    {
        $db = new Connection();
        $query = "UPDATE contratos SET processo=:processo, encaminhamento=:encaminhamento, area=:area, data_inicio=:data_inicio, data_fim=:data_fim, media_final=:media_final, supervisor=:supervisor, s_cargo=:s_cargo, s_telefone=:s_telefone, s_email=:s_email, observacao=:observacao, encerramento=:encerramento, id_empresa=:id_empresa, id_estudante=:id_estudante, id_professor=:id_professor WHERE id = :id";
        $binds = [
            "id" => $vo->getId(),
            "processo" => $vo->getProcesso(),
            "encaminhamento" => $vo->getEncaminhamento(),
            "area" => $vo->getArea(),
            "data_inicio" => $vo->getData_inicio(),
            "data_fim" => $vo->getData_fim(),
            "supervisor" => $vo->getSupervisor(),
            "s_cargo" => $vo->getS_cargo(),
            "s_telefone" => $vo->getS_telefone(),
            "s_email" => $vo->getS_email(),
            "encerramento" => $vo->getEncerramento(),
            "id_empresa" => $vo->getId_empresa(),
            "id_estudante" => $vo->getId_estudante(),
            "id_professor" => $vo->getId_professor()
        ];
        return $db->execute($query, $binds);
    }

    public function delete($vo)
    {
        $db = new Connection();
        $query = "DELETE FROM contratos WHERE id = :id";
        $binds = ["id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}