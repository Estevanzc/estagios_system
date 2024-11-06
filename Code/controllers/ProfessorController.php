<?php

namespace Controller;

use Model\ProfessorModel;
use Model\VO\ProfessorVO;

final class ProfessorController extends Controller {

    public function list() {
        $model = new ProfessorModel();
        $data = $model->selectAll(new ProfessorVO());

        $this->loadView("listaAlunos", [
            "alunos" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new ProfessorModel();
            $vo = new ProfessorVO($id);
            $aluno = $model->selectOne($vo);
        } else {
            $aluno = new ProfessorVO();
        }

        $this->loadView("formAluno", [
            "aluno" => $aluno
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new ProfessorModel();
        $nome_arquivo = $this->uploadFile($_FILES["foto"], empty($id) ? "" : $model->selectOne(new ProfessorVO($id))->getFoto());
        $vo = new ProfessorVO($id, $_POST["nome"], $_POST["matricula"], $nome_arquivo);

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("alunos.php");
    }

    public function remove() {
        $vo = new ProfessorVO($_GET["id"]);
        $model = new ProfessorModel();
        $vo = $model->selectOne($vo);

        $result = $model->delete($vo);

        $this->redirect("alunos.php");
    }

}