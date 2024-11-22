<?php

namespace Controller;

use Model\EmpresaModel;
use Model\VO\EmpresaVO;

final class EmpresaController extends Controller {

    public function list() {
        $model = new EmpresaModel();
        $data = $model->selectAll(new EmpresaVO());

        $this->loadView("listaEmpresas", [
            "empresas" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new EmpresaModel();
            $vo = new EmpresaVO($id);
            $empresa = $model->selectOne($vo);
        } else {
            $empresa = new EmpresaVO();
        }

        $this->loadView("formEmpresa", [
            "empresa" => $empresa
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new EmpresaModel();
        $nome_arquivo = $this->uploadFile($_FILES["foto"], (empty($id) ? "" : $model->selectOne(new EmpresaVO($id))->getFoto()));
        $vo = new EmpresaVO($id, $_POST["nome"], $_POST["razao_social"], $_POST["email"], $_POST["cnpj"], $_POST["representante"], $_POST["r_funcao"], $_POST["r_cpf"], $_POST["r_rg"], $_POST["cidade"], $_POST["endereco"], $_POST["telefone"], $_POST["convenio"], $nome_arquivo);

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("empresas.php");
    }

    public function remove() {
        $vo = new EmpresaVO($_GET["id"]);
        $model = new EmpresaModel();
        $vo = $model->selectOne($vo);

        $result = $model->delete($vo);

        $this->redirect("empresas.php");
    }

}