<?php

namespace Model;

use Model\VO\ProfessorVO;
use Controller\ProfessorController;

final class ProfessorModel extends Model {

    public function selectAll($vo) {
        $db = new Connection();
        $query = "SELECT * FROM professores";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new ProfessorVO($row["id"], $row["nome"], $row["email"], $row["siape"], $row["cpf"], $row["rg"], $row["cidade"], $row["endereco"], $row["telefone"], $row["funcao"], $row["foto"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Connection();
        $query = "SELECT * FROM professores WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new ProfessorVO($data[0]["id"], $data[0]["nome"], $data[0]["email"], $data[0]["siape"], $data[0]["cpf"], $data[0]["rg"], $data[0]["cidade"], $data[0]["endereco"], $data[0]["telefone"], $data[0]["funcao"], $data[0]["foto"]);
    }
    public function selectIdByEmail($email) {
        $db = new Connection();
        $query = "SELECT professores.id FROM professores WHERE email = :email";
        $binds = ["email" => $email];
        $data = $db->select($query, $binds);

        return $data[0]["id"];
    }

    public function insert($vo) {
        $db = new Connection();
        $query = "INSERT INTO professores VALUES (default, :nome, :email, :siape, :cpf, :rg, :cidade, :endereco, :telefone, :funcao".(empty($vo->getFoto()) ? "" : ", :foto").")";
        $binds = [
            "nome" => $vo->getNome(),
            "email" => $vo->getEmail(),
            "siape" => $vo->getSiape(),
            "cpf" => $vo->getCpf(),
            "rg" => $vo->getRg(),
            "cidade" => $vo->getCidade(),
            "endereco" => $vo->getEndereco(),
            "telefone" => $vo->getTelefone(),
            "funcao" => $vo->getFuncao(),
        ];
        if (!empty($vo->getFoto())) {
            $binds["foto"] = $vo->getFoto();
        }

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Connection();
        $query = "UPDATE professores SET nome=:nome, email=:email, siape=:siape, cpf=:cpf, rg=:rg, cidade=:cidade, endereco=:endereco, telefone=:telefone, funcao=:funcao".(empty($vo->getFoto()) ? "" : ", foto=:foto")." WHERE id = :id";
        $binds = [
            "id" => $vo->getId(),
            "nome" => $vo->getNome(),
            "email" => $vo->getEmail(),
            "siape" => $vo->getSiape(),
            "cpf" => $vo->getCpf(),
            "rg" => $vo->getRg(),
            "cidade" => $vo->getCidade(),
            "endereco" => $vo->getEndereco(),
            "telefone" => $vo->getTelefone(),
            "funcao" => $vo->getFuncao(),
        ];
        if (!empty($vo->getFoto())) {
            $binds["foto"] = $vo->getFoto();
        }

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Connection();
        $query = "DELETE FROM professores WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        (new ProfessorController())->deleteFile($vo->getFoto());

        return $db->execute($query, $binds);
    }

}