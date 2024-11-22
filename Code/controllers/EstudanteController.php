<?php

namespace Controller;

use Model\EstudanteModel;
use Model\VO\EstudanteVO;

final class EstudanteController extends Controller {

    public function list() {
        $model = new EstudanteModel();
        $data = $model->selectAll(new EstudanteVO());

        $this->loadView("listaEstudantes", [
            "estudantes" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new EstudanteModel();
            $vo = new EstudanteVO($id);
            $estudante = $model->selectOne($vo);
        } else {
            $estudante = new EstudanteVO();
        }

        $this->loadView("formEstudante", [
            "estudante" => $estudante
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new EstudanteModel();
        $nome_arquivo = $this->uploadFile($_FILES["foto"], (empty($id) ? "" : $model->selectOne(new EstudanteVO($id))->getFoto()));
        $vo = new EstudanteVO($id, $_POST["nome"], $_POST["email"], $_POST["matricula"], $_POST["matricula_ativa"], $_POST["ano_curso"], $_POST["cpf"], $_POST["rg"], $_POST["data_nasc"], $_POST["res_nome"], $_POST["res_email"], $_POST["cidade"], $_POST["endereco"], $_POST["telefone"], $_POST["id_curso"], $nome_arquivo);

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("estudantes.php");
    }

    public function remove() {
        $vo = new EstudanteVO($_GET["id"]);
        $model = new EstudanteModel();
        $vo = $model->selectOne($vo);

        $result = $model->delete($vo);

        $this->redirect("estudantes.php");
    }

}