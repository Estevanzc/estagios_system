<?php

namespace Model;

use Model\VO\EstudanteVO;
use Controller\EstudanteController;

final class EstudanteModel extends Model {

    public function selectAll($vo) {
        $db = new Connection();
        $query = "SELECT * FROM estudante";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new EstudanteVO($row["id"], $row["nome"], $row["email"], $row["matricula"], $row["cpf"], $row["rg"], $row["cidade"], $row["endereco"], $row["telefone"], $row["foto"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Connection();
        $query = "SELECT * FROM estudante WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new EstudanteVO($data[0]["id"], $data[0]["nome"], $data[0]["email"], $data[0]["matricula"], $data[0]["cpf"], $data[0]["rg"], $data[0]["cidade"], $data[0]["endereco"], $data[0]["telefone"], $data[0]["foto"]);
    }

    public function insert($vo) {
        $db = new Connection();
        if (empty($vo->getFoto())) {
            $query = "INSERT INTO estudante VALUES (default, :nome, :email, :matricula, :cpf, :rg, :cidade, :endereco, :telefone)";
            $binds = [
                "nome" => $vo->getNome(),
                "email" => $vo->getEmail(),
                "matricula" => $vo->getMatricula(),
                "cpf" => $vo->getCpf(),
                "rg" => $vo->getRg(),
                "cidade" => $vo->getCidade(),
                "endereco" => $vo->getEndereco(),
                "telefone" => $vo->getTelefone(),
            ];
        } else {
            $query = "INSERT INTO estudante VALUES (default, :nome, :email, :matricula, :cpf, :rg, :cidade, :endereco, :telefone, :foto)";
            $binds = [
                "nome" => $vo->getNome(),
                "email" => $vo->getEmail(),
                "matricula" => $vo->getMatricula(),
                "cpf" => $vo->getCpf(),
                "rg" => $vo->getRg(),
                "cidade" => $vo->getCidade(),
                "endereco" => $vo->getEndereco(),
                "telefone" => $vo->getTelefone(),
                "foto" => $vo->getFoto(),
            ];
        }

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Connection();
        if (empty($vo->getFoto())) {
            $query = "UPDATE estudante SET nome=:nome, email=:email, matricula=:matricula, cpf=:cpf, rg=:rg, cidade=:cidade, endereco=:endereco, telefone=:telefone WHERE id = :id";
            $binds = [
                "id" => $vo->getId(),
                "nome" => $vo->getNome(),
                "email" => $vo->getEmail(),
                "matricula" => $vo->getMatricula(),
                "cpf" => $vo->getCpf(),
                "rg" => $vo->getRg(),
                "cidade" => $vo->getCidade(),
                "endereco" => $vo->getEndereco(),
                "telefone" => $vo->getTelefone(),
            ];
        } else {
            $query = "UPDATE estudante SET nome=:nome, email=:email, matricula=:matricula, cpf=:cpf, rg=:rg, cidade=:cidade, endereco=:endereco, telefone=:telefone, foto=:foto WHERE id = :id";
            $binds = [
                "id" => $vo->getId(),
                "nome" => $vo->getNome(),
                "email" => $vo->getEmail(),
                "matricula" => $vo->getMatricula(),
                "cpf" => $vo->getCpf(),
                "rg" => $vo->getRg(),
                "cidade" => $vo->getCidade(),
                "endereco" => $vo->getEndereco(),
                "telefone" => $vo->getTelefone(),
                "foto" => $vo->getFoto(),
            ];
        }

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Connection();
        $query = "DELETE FROM estudante WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        (new EstudanteController())->deleteFile($vo->getFoto());

        return $db->execute($query, $binds);
    }



}