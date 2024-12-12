<?php

namespace Controller;

use Model\EmpresaModel;
use Model\UsuarioModel;
use Model\ContratoModel;
use Model\VO\EmpresaVO;
use Model\VO\UsuarioVO;
use Model\VO\ContratoVO;

final class EmpresaController extends Controller {

    public function list() {
        $model = new EmpresaModel();
        $data = $model->selectAll(new EmpresaVO());

        $contrato = (new ContratoModel())->selectAll(new ContratoVO());
        $this->loadView("listaEmpresas", [
            "empresas" => $data,
            "contratos" => $contrato
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
            (new UsuarioModel())->insert(new UsuarioVO(null, $vo["email"], $vo["cnpj"], 3, $nome_arquivo));
        } else {
            $id_usuario = (new UsuarioModel())->selectByemail($model->selectOne($vo)["email"]);
            $result = $model->update($vo);
            (new UsuarioModel())->update(new UsuarioVO($id_usuario, $vo->getEmail(), null, 1, $vo->getFoto()));
        }

        $this->redirect("empresas.php");
    }

    public function remove() {
        $vo = new EmpresaVO($_GET["id"]);
        $model = new EmpresaModel();
        $vo = $model->selectOne($vo);
        (new UsuarioModel())->delete(new UsuarioVO(null, $vo["email"]));

        $result = $model->delete($vo);

        $this->redirect("empresas.php");
    }

}