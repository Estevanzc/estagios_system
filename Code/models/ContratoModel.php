<?php

namespace Model;

use Model\VO\ContratoVO;
use Controller\ContratoController;

final class ContratoModel extends Model {

    public function selectAll($vo) {
        $db = new Connection();
        $query = "SELECT * FROM contrato";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new ContratoVO($row["id"], $row["processo"], $row["encaminhamento"], $row["area"], $row["data_inicio"], $row["data_fim"], $row["carga_horaria"], $row["id_empresa"], $row["id_estudante"], $row["id_professor"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Connection();
        $query = "SELECT * FROM contrato WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new ContratoVO($data[0]["id"], $data[0]["processo"], $data[0]["encaminhamento"], $data[0]["area"], $data[0]["data_inicio"], $data[0]["data_fim"], $data[0]["carga_horaria"], $data[0]["id_empresa"], $data[0]["id_estudante"], $data[0]["id_professor"]);
    }

    public function insert($vo) {
        $db = new Connection();
        $query = "INSERT INTO contrato VALUES (default, :processo, :encaminhamento, :area, :data_inicio, :data_fim, :carga_horaria, :id_empresa, :id_estudante, :id_professor)";
        $binds = [
        "processo" => $vo->getProcesso(),
        "encaminhamento" => $vo->getEncaminhamento(),
        "area" => $vo->getArea(),
        "data_inicio" => $vo->getData_inicio(),
        "data_fim" => $vo->getData_fim(),
        "carga_horaria" => $vo->getCarga_horaria(),
        "id_empresa" => $vo->getId_empresa(),
        "id_estudante" => $vo->getId_estudante(),
        "id_professor" => $vo->getId_professor(),
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Connection();
        $query = "UPDATE contrato SET processo=:processo, encaminhamento=:encaminhamento, area=:area, data_inicio=:data_inicio, data_fim=:data_fim, carga_horaria=:carga_horaria, id_empresa=:id_empresa, id_estudante=:id_estudante, id_professor=:id_professor WHERE id = :id";
        $binds = [
            "id" => $vo->getId(),
            "processo" => $vo->getProcesso(),
            "encaminhamento" => $vo->getEncaminhamento(),
            "area" => $vo->getArea(),
            "data_inicio" => $vo->getData_inicio(),
            "data_fim" => $vo->getData_fim(),
            "carga_horaria" => $vo->getCarga_horaria(),
            "id_empresa" => $vo->getId_empresa(),
            "id_estudante" => $vo->getId_estudante(),
            "id_professor" => $vo->getId_professor(),
        ];
        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Connection();
        $query = "DELETE FROM contrato WHERE id = :id";
        $binds = ["id" => $vo->getId()];

        return $db->execute($query, $binds);
    }



}