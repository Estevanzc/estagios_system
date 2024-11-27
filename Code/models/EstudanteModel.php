<?php

namespace Model;

use Model\VO\EstudanteVO;
use Controller\EstudanteController;

final class EstudanteModel extends Model {

    public function selectAll($vo) {
        $db = new Connection();
        $query = "SELECT * FROM estudantes";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new EstudanteVO($row["id"], $row["nome"], $row["email"], $row["matricula"], $row["matricula_ativa"],  $row["ano_curso"], $row["cpf"], $row["rg"], $row["data_nasc"], $row["res_nome"], $row["res_email"], $row["cidade"],$row["endereco"],$row["telefone"], $row["id_curso"], $row["foto"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Connection();
        $query = "SELECT * FROM estudantes WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new EstudanteVO($data[0]["id"], $data[0]["nome"], $data[0]["email"], $data[0]["matricula"], $data[0]["matricula_ativa"],  $data[0]["ano_curso"], $data[0]["cpf"], $data[0]["rg"], $data[0]["data_nasc"], $data[0]["res_nome"], $data[0]["res_email"], $data[0]["cidade"],$data[0]["endereco"],$data[0]["telefone"], $data[0]["id_curso"], $data[0]["foto"]);
    }

    public function insert($vo) {
        $db = new Connection();
        $query = "INSERT INTO estudantes VALUES (default, :nome, :email, :matricula, :matricula_ativa, :ano_curso, :cpf, :rg, :data_nasc, :res_nome, :res_email, :cidade, :endereco, :telefone, :id_curso".(empty($vo->getFoto()) ? "" : ", :foto").")";
        
        $binds = [
            "nome" => $vo->getNome(),
            "email" => $vo->getEmail(),
            "matricula" => $vo->getMatricula(),
            "matricula_ativa" => $vo->getMatricula_ativa(),
            "ano_curso" => $vo->getAno_curso(),
            "cpf" => $vo->getCpf(),
            "rg" => $vo->getRg(),
            "data_nasc" => $vo->getData_nasc(),
            "res_nome" => $vo->getRes_nome(),
            "res_email" => $vo->getRes_email(),
            "cidade" => $vo->getCidade(),
            "endereco" => $vo->getEndereco(),
            "telefone" => $vo->getTelefone(),
            "id_curso" => $vo->getId_curso(),
        ];
        if (!empty($vo->getFoto())) {
            $binds["foto"] = $vo->getFoto();
        }

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Connection();
        $query = "UPDATE estudantes SET nome=:nome, email=:email, matricula=:matricula, matricula_ativa=:matricula_ativa, ano_curso=:ano_curso, cpf=:cpf, rg=:rg, data_nasc=:data_nasc, res_nome=:res_nome, res_email=:res_email, cidade=:cidade, endereco=:endereco, telefone=:telefone, id_curso=:id_curso".(empty($vo->getFoto()) ? "" : ", foto=:foto")." WHERE id = :id";
        
        $binds = [
            "id" => $vo->getId(),
            "nome" => $vo->getNome(),
            "email" => $vo->getEmail(),
            "matricula" => $vo->getMatricula(),
            "matricula_ativa" => $vo->getMatricula_ativa(),
            "ano_curso" => $vo->getAno_curso(),
            "cpf" => $vo->getCpf(),
            "rg" => $vo->getRg(),
            "data_nasc" => $vo->getData_nasc(),
            "res_nome" => $vo->getRes_nome(),
            "res_email" => $vo->getRes_email(),
            "cidade" => $vo->getCidade(),
            "endereco" => $vo->getEndereco(),
            "telefone" => $vo->getTelefone(),
            "id_curso" => $vo->getId_curso(),
        ];
        if (!empty($vo->getFoto())) {
            $binds["foto"] = $vo->getFoto();
        }

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Connection();
        $query = "DELETE FROM estudantes WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        (new EstudanteController())->deleteFile($vo->getFoto());

        return $db->execute($query, $binds);
    }

}