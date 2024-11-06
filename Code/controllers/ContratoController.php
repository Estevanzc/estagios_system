<?php

namespace Controller;

use Model\ContratoModel;
use Model\VO\ContratoVO;

final class AlunoController extends Controller {

    public function list() {
        $model = new ContratoModel();
        $data = $model->selectAll(new ContratoVO());

        $this->loadView("listaAlunos", [
            "alunos" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new ContratoModel();
            $vo = new ContratoVO($id);
            $aluno = $model->selectOne($vo);
        } else {
            $aluno = new ContratoVO();
        }

        $this->loadView("formAluno", [
            "aluno" => $aluno
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new ContratoModel();
        $nome_arquivo = $this->uploadFile($_FILES["foto"], empty($id) ? "" : $model->selectOne(new ContratoVO($id))->getFoto());
        $vo = new ContratoVO($id, $_POST["nome"], $_POST["matricula"], $nome_arquivo);

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("alunos.php");
    }

    public function remove() {
        $vo = new ContratoVO($_GET["id"]);
        $model = new ContratoModel();
        $vo = $model->selectOne($vo);

        $result = $model->delete($vo);

        $this->redirect("alunos.php");
    }

}