<?php

namespace Model;

use Model\VO\EmpresaVO;
use Controller\EmpresaController;

final class EmpresaModel extends Model {

    public function selectAll($vo) {
        $db = new Connection();
        $query = "SELECT * FROM empresa";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new EmpresaVO($row["id"], $row["nome"], $row["razao_social"], $row["email"], $row["cnpj"], $row["representante"], $row["r_funcao"], $row["r_cpf"], $row["r_rg"], $row["cidade"], $row["endereco"], $row["telefone"], $row["convenio"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Connection();
        $query = "SELECT * FROM empresa WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new EmpresaVO($data[0]["id"], $data[0]["nome"], $data[0]["razao_social"], $data[0]["email"], $data[0]["cnpj"], $data[0]["representante"], $data[0]["r_funcao"], $data[0]["r_cpf"], $data[0]["r_rg"], $data[0]["cidade"], $data[0]["endereco"], $data[0]["telefone"], $data[0]["convenio"]);
    }

    public function insert($vo) {
        $db = new Connection();
        $query = "INSERT INTO empresa VALUES (default, :nome, :razao_social, :email, :cnpj, :representante, :r_funcao, :r_cpf, :r_rg, :cidade, :endereco, :telefone, :convenio)";
        $binds = [
            "nome" => $vo->getNome(),
            "razao_social" => $vo->getRazao_social(),
            "email" => $vo->getEmail(),
            "cnpj" => $vo->getCnpj(),
            "representante" => $vo->getRepresentante(),
            "r_funcao" => $vo->getR_funcao(),
            "r_cpf" => $vo->getR_cpf(),
            "r_rg" => $vo->getR_rg(),
            "cidade" => $vo->getCidade(),
            "endereco" => $vo->getEndereco(),
            "telefone" => $vo->getTelefone(),
            "convenio" => $vo->getConvenio()
        ];
        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Connection();
        $query = "UPDATE empresa SET nome=:nome, razao_social=:razao_social, email=:email, cnpj=:cnpj, representante=:representante, r_funcao=:r_funcao, r_cpf=:r_cpf, r_rg=:r_rg, cidade=:cidade, endereco=:endereco, telefone=:telefone, convenio=:convenio WHERE id = :id";
        $binds = [
            "id" => $vo->getId(),
            "nome" => $vo->getNome(),
            "razao_social" => $vo->getRazao_social(),
            "email" => $vo->getEmail(),
            "cnpj" => $vo->getCnpj(),
            "representante" => $vo->getRepresentante(),
            "r_funcao" => $vo->getR_funcao(),
            "r_cpf" => $vo->getR_cpf(),
            "r_rg" => $vo->getR_rg(),
            "cidade" => $vo->getCidade(),
            "endereco" => $vo->getEndereco(),
            "telefone" => $vo->getTelefone(),
            "convenio" => $vo->getConvenio()
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Connection();
        $query = "DELETE FROM empresa WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        (new EmpresaController())->deleteFile($vo->getFoto());

        return $db->execute($query, $binds);
    }

}