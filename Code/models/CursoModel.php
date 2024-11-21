<?php

namespace Model;

use Model\VO\CursoVO;
use Controller\CursoController;

final class CursoModel extends Model
{

    public function selectAll($vo)
    {
        $db = new Connection();
        $query = "SELECT * FROM cursos";
        $data = $db->select($query);

        $arrayDados = [];

        foreach ($data as $row) {
            $vo = new CursoVO($row["id"], $row["nome"], $row["carga_horaria"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo)
    {
        $db = new Connection();
        $query = "SELECT * FROM cursos WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new CursoVO($data[0]["id"], $data[0]["nome"], $data[0]["carga_horaria"]);
    }

    public function insert($vo)
    {
        $db = new Connection();
        $query = "INSERT INTO cursos VALUES (default, :nome, carga_horaria)";
        $binds = [
            "nome" => $vo->getNome(),
            "carga_horaria" => $vo->getCarga_horaria()
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo)
    {
        $db = new Connection();
        $query = "UPDATE cursos SET nome=:nome, carga_horaria=:carga_horaria";
        $binds = [
            "id" => $vo->getId(),
            "nome" => $vo->getNome(),
            "carga_horaria" => $vo->getCarga_horaria(),
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo)
    {
        $db = new Connection();
        $query = "DELETE FROM cursos WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        (new CursoController())->deleteFile($vo->getFoto());

        return $db->execute($query, $binds);
    }
}
