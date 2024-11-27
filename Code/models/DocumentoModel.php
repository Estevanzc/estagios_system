<?php

namespace Model;

use Model\VO\DocumentoVO;
use Controller\DocumentoController;

final class DocumentoModel extends Model
{

    public function selectAll($vo)
    {
        $db = new Connection();
        $query = "SELECT * FROM documentos";
        $data = $db->select($query);

        $arrayDados = [];

        foreach ($data as $row) {
            $vo = new DocumentoVO($row["id"], $row["tipo"], $row["nome"], $row["id_contrato"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo)
    {
        $db = new Connection();
        $query = "SELECT * FROM documentos WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new DocumentoVO($data[0]["id"], $data[0]["tipo"], $data[0]["nome"], $data[0]["id_contrato"]);
    }
    public function selectBycontrato($id_contrato) {
        $db = new Connection();
        $query = "SELECT * FROM documentos WHERE id_contrato=:id_contrato";
        $binds = ["id_contrato" => $id_contrato];
        $data = $db->select($query, $binds);
        
        $arrayDados = [];
        foreach ($data as $row) {
            $vo = new DocumentoVO($row["id"], $row["tipo"], $row["nome"], $row["id_contrato"]);
            array_push($arrayDados, $vo);
        }
        return $arrayDados;
    }

    public function insert($vo)
    {
        $db = new Connection();
        $query = "INSERT INTO documentos VALUES (default, :tipo, :nome, :id_contrato)";
        $binds = [
            "tipo" => $vo->getTipo(),
            "nome" => $vo->getNome(),
            "id_contrato" => $vo->getId_contrato()
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo)
    {
        $db = new Connection();
        $query = "UPDATE documentos SET tipo=:tipo, nome=:nome, id_contrato=:id_contrato WHERE id = :id";
        $binds = [
            "id" => $vo->getId(),
            "tipo" => $vo->getTipo(),
            "nome" => $vo->getNome(),
            "id_contrato" => $vo->getId_contrato()
        ];
        return $db->execute($query, $binds);
    }

    public function delete($vo)
    {
        $db = new Connection();
        $query = "DELETE FROM documentos WHERE id = :id";
        $binds = ["id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}