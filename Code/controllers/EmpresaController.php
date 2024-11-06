<?php

namespace Controller;

use Model\EmpresaModel;
use Model\VO\EmpresaVO;

final class EmpresaController extends Controller {

    public function list() {
        $model = new EmpresaModel();
        $data = $model->selectAll(new EmpresaVO());

        $this->loadView("listaAlunos", [
            "alunos" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new EmpresaModel();
            $vo = new EmpresaVO($id);
            $aluno = $model->selectOne($vo);
        } else {
            $aluno = new EmpresaVO();
        }

        $this->loadView("formAluno", [
            "aluno" => $aluno
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new EmpresaModel();
        $nome_arquivo = $this->uploadFile($_FILES["foto"], empty($id) ? "" : $model->selectOne(new EmpresaVO($id))->getFoto());
        $vo = new EmpresaVO($id, $_POST["nome"], $_POST["matricula"], $nome_arquivo);

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("alunos.php");
    }

    public function remove() {
        $vo = new EmpresaVO($_GET["id"]);
        $model = new EmpresaModel();
        $vo = $model->selectOne($vo);

        $result = $model->delete($vo);

        $this->redirect("alunos.php");
    }

}