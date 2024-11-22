<?php

namespace Model;

use Model\VO\BancaVO;
use Controller\BancaController;

final class BancaModel extends Model
{

    public function selectAll($vo)
    {
        $db = new Connection();
        $query = "SELECT * FROM bancas";
        $data = $db->select($query);

        $arrayDados = [];

        foreach ($data as $row) {
            $vo = new BancaVO($row["id"], $row["nome"], $row["email"], $row["id_contrato"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo)
    {
        $db = new Connection();
        $query = "SELECT * FROM bancas WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new BancaVO($data[0]["id"], $data[0]["nome"], $data[0]["email"], $data[0]["id_contrato"]);
    }

    public function insert($vo)
    {
        $db = new Connection();
        $query = "INSERT INTO bancas VALUES (default, :nome, :email, :id_contrato)";
        $binds = [
            "nome" => $vo->getNome(),
            "email" => $vo->getEmail(),
            "id_contrato" => $vo->getId_contrato()
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo)
    {
        $db = new Connection();
        $query = "UPDATE bancas SET nome=:nome, email=:email, id_contrato=:id_contrato WHERE id = :id";
        $binds = [
            "id" => $vo->getId(),
            "nome" => $vo->getNome(),
            "email" => $vo->getEmail(),
            "id_contrato" => $vo->getId_contrato()
        ];
        return $db->execute($query, $binds);
    }

    public function delete($vo)
    {
        $db = new Connection();
        $query = "DELETE FROM bancas WHERE id = :id";
        $binds = ["id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}